<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'accountNumber' => ['required','string', 'min:10'],
            'amount' => ['required','numeric'],
            'description' => ['required','string', 'min:5'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
