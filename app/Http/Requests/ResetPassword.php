<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ResetPassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'password' => 'required|min:4',
            'password_confirm' => 'required|min:4|same:password'
        ];
    }
}
