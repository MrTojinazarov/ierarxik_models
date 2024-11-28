<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
