<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:coupons,code,' . request()->route('coupon')->id,
            ],
            'type' => [
                'string',
                'required',
            ],
            'value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'percent_off' => [
                'string',
                'nullable',
            ],
        ];
    }
}
