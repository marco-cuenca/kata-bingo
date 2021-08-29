<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckWinnerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'card_id' => [
                'required',
            ],
        ];
    }
}
