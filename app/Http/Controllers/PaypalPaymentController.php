<?php

namespace App\Http\Controllers;

use PayPal;
use Exception;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Thedudeguy\Rcon;


class PaypalPaymentController extends Controller
{
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $product = Product::findOrFail($data['product_id']);
        $subtotal = $product->price * $data['quantity'];
        $total = $subtotal;
        $validCoupon = null;
        if($data['coupon']){
            $coupon = Coupon::where('code', $data['coupon'])->first();
            if(!isset($coupon)){
                return response()->json(['status'=> false, 'msg'=> 'Not Found']);
            }
            $validCoupon = Coupon::where('id', $coupon->id);
            if(isset($coupon->uses_allowed) && $coupon->uses_allowed != 0){
                $validCoupon->where('uses_allowed', '>', $coupon->used_times ?? 0);
            }
    
            if(isset($coupon->start_date)&& $coupon->start_date != 0){
                $validCoupon->whereDate('start_date', '<', Carbon::now());
            }
    
            if(isset($coupon->end_date) && $coupon->end_date != 0){
                $validCoupon->whereDate('end_date', '>', Carbon::now());
            }
    
            $validCoupon = $validCoupon->first();

            if(!isset($validCoupon)) {
                return response()->json(['status'=> false, 'msg'=> 'Expired Coupon']);
            }    

            if($validCoupon->type == 'value'){
                $total = $subtotal - $validCoupon->value;
            } else {
                $total = $subtotal - ($validCoupon->percent_off * $subtotal / 100);
            }
        }
        if($total != $data['amount']) {
            return response()->json(['status'=> false, 'msg'=> 'Something Wrong']);
        }
        PayPal::setProvider();
        $paypalProvider = PayPal::getProvider();
        $paypalProvider->setApiCredentials(config('paypal'));
        $paypalProvider->setAccessToken($paypalProvider->getAccessToken());
        $order = $paypalProvider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                 [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> $total
                    ],
                    'description' => $product->name . ' X ' . $data['quantity']
                ]
            ],
        ]);
        // $mergeData = array_merge($data,['status' => 'pending', 'vendor_order_id' => $order['id']]);
        Order::create([
            'user_id' => \Auth::id(),
            'coupon_id' => $validCoupon ? $validCoupon->id : null,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_quantity' => $data['quantity'],
            'order_price' => $total,
            'payment_gateway' => 'paypal',
            'payment' => $order['id'],
            'status' => 'pending'
        ]);
        return response()->json($order);
    }

    public function capture(Request $request)
    {
        PayPal::setProvider();
        $paypalProvider = PayPal::getProvider();
        $paypalProvider->setApiCredentials(config('paypal'));
        $paypalProvider->setAccessToken($paypalProvider->getAccessToken());
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $paypalProvider->setApiCredentials(config('paypal'));
        $token = $paypalProvider->getAccessToken();
        $paypalProvider->setAccessToken($token);
        $result = $paypalProvider->capturePaymentOrder($orderId);

//            $result = $result->purchase_units[0]->payments->captures[0];
        try {
            // DB::beginTransaction();
            $order = Order::where('payment', $orderId)->first();
            if($result['status'] === "COMPLETED"){
                
                
                
                $order->status = 'sucess';
                if(isset($order->coupon)){
                    $coupon = Coupon::find($order->coupon->id);
                    $coupon->used_times = isset($coupon->used_times) ? $coupon->used_times + 1 : 1;
                    $coupon->save();
                }
                $order->save();

                \Session::flash('success', 'Payment Complete .. Enjoy your New Items!');

                $host = '31.214.247.113';	// put your RCON host (server ip) here!
                $port = 25576;	// put your RCON port here!
                $password = 'Alim412341weaasw'; // put your RCON password here!
                $timeout = 10;

                $rcon = new Rcon($host, $port, $password, $timeout);

                if ($rcon->connect())
                {
                    for ($x = 0; $x < $order->product_quantity; $x++) {
                        $command = "po " . $order->user->username . " " . $order->product->package;
                        $rcon->sendCommand($command);
                    }
                }
            }else {
                $order->status = 'failed';
                $order->save();

                \Session::flash('danger', 'There was a problem with your payment!');
            }
            // DB::commit();
        } catch (Exception $e) {
            // DB::rollBack();
            dd($e);
            \Session::flash('danger', 'There was a problem please contact support!');

        }
        return response()->json($result);
    }

}
