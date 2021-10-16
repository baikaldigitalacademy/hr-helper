<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'password' => 'min:8',
            'email' => 'required|email:rfc,dns|max:256|unique:users',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Обязательное поле',
            '*.max' => 'Максимальное количество символов :max',
            '*.min' => 'Минимальное количество символов :min',
            '*.unique' => 'Данный :attribute уже существует',
            '*.email' => 'Должен соответствовать example@example.com',
        ];
    }
}
