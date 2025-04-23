<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:200'],
            'email' => ['required', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'max:200'],
            'phoneNumber' => ['required', 'string', 'min:10', 'max:20', 'unique:users']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
