<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'product_name' => [
                'string',
                'nullable',
            ],
            'product_quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'order_price' => [
                'required',
            ],
            'payment_gateway' => [
                'string',
                'nullable',
            ],
            'payment' => [
                'string',
                'nullable',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
