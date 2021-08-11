<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketCreateRequest extends FormRequest
{
    public function authorize()
    {
        return 1;
    }

    public function rules()
    {
        return [
            'subject'   => 'required',
            'content'   => 'required',
        ];
    }
}
