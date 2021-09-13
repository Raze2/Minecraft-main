@extends('layouts.frontend')

@section('content')
<section class="pricing_part padding_top">
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
        @endif
        <div class="row">
            <div class="card mb-4 w-100">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section_tittle text-center my-3">
                                <h2>{{ __('frontend.orders') }}</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-dark" cellspacing="0" width="100%">
                        <thead>
                            <tr class="thead-dark">
                                <th>#</th>
                                <th>{{ __('frontend.orderspage.product') }}</th>
                                <th>{{ __('frontend.orderspage.quantity') }}</th>
                                <th>{{ __('frontend.orderspage.price') }}</th>
                                <th>{{ __('frontend.orderspage.method') }}</th>
                                <th>{{ __('frontend.orderspage.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse  (\Auth::user()->userOrders->where('status', 'sucess') as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->product_quantity}}</td>
                                    <td>{{$order->order_price}}</td>
                                    <td>{{$order->payment_gateway}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>
                            @empty
                                <p> You Have No Orders </p>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
