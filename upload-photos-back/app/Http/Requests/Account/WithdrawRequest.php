<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric'],
            'description' => ['string', 'min:5'],
            'pin' => ['required', 'string', 'min:4'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
