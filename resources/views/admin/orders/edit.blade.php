@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_name">{{ trans('cruds.order.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', $order->product_name) }}">
                @if($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_price">{{ trans('cruds.order.fields.product_price') }}</label>
                <input class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}" type="number" name="product_price" id="product_price" value="{{ old('product_price', $order->product_price) }}" step="0.01">
                @if($errors->has('product_price'))
                    <span class="text-danger">{{ $errors->first('product_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_quantity">{{ trans('cruds.order.fields.product_quantity') }}</label>
                <input class="form-control {{ $errors->has('product_quantity') ? 'is-invalid' : '' }}" type="number" name="product_quantity" id="product_quantity" value="{{ old('product_quantity', $order->product_quantity) }}" step="1">
                @if($errors->has('product_quantity'))
                    <span class="text-danger">{{ $errors->first('product_quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_price">{{ trans('cruds.order.fields.order_price') }}</label>
                <input class="form-control {{ $errors->has('order_price') ? 'is-invalid' : '' }}" type="number" name="order_price" id="order_price" value="{{ old('order_price', $order->order_price) }}" step="0.01" required>
                @if($errors->has('order_price'))
                    <span class="text-danger">{{ $errors->first('order_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_gateway">{{ trans('cruds.order.fields.payment_gateway') }}</label>
                <input class="form-control {{ $errors->has('payment_gateway') ? 'is-invalid' : '' }}" type="text" name="payment_gateway" id="payment_gateway" value="{{ old('payment_gateway', $order->payment_gateway) }}">
                @if($errors->has('payment_gateway'))
                    <span class="text-danger">{{ $errors->first('payment_gateway') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_gateway_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment">{{ trans('cruds.order.fields.payment') }}</label>
                <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="text" name="payment" id="payment" value="{{ old('payment', $order->payment) }}">
                @if($errors->has('payment'))
                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.order.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $order->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection