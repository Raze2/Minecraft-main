<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['product', 'user', 'coupon'])->get();

        $products = Product::get();

        $users = User::get();

        $coupons = Coupon::get();

        return view('admin.orders.index', compact('orders', 'products', 'users', 'coupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('products', 'users', 'coupons'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('product', 'user', 'coupon');

        return view('admin.orders.show', compact('order'));
    }
}