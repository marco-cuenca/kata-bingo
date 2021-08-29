<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'gamer' => [
                'required',
                'max:100',
            ],
            'game_id' => [
                'required',
            ],
        ];
    }
}
