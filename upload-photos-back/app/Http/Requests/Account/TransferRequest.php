<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receiver_account_number' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:10'],
            'pin' => ['required', 'string', 'min:4'],
            'description' => ['nullable', 'max:200']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
