<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:60',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^(\+380)[0-9]{9}$/|',
            'photo' => 'required',
            'password' => 'required|min:8',
        ];
    }

}
