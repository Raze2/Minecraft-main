<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($cat)
    {
        $products = Product::with('media')->where('category', $cat)->get();

        return view('frontend.store.index', compact('products', 'cat'));
    }

    public function pay(Product $product)
    {
        return view('frontend.store.pay', compact('product'));
    }

    public function checkCoupon(Request $request) {
        $data = json_decode($request->getContent(), true);
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
        return response()->json(['status'=> true, 'type'=> $validCoupon->type, 'percent_off'=> $validCoupon->percent_off , 'value'=> $validCoupon->value]);
    }
}
