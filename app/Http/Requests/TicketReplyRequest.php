<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketReplyRequest extends FormRequest
{
    public function authorize()
    {
        return 1;
    }

    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }
}
