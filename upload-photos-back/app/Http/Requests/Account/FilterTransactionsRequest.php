<?php

namespace App\Http\Requests\Account;

use App\Enums\TransactionCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterTransactionsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'startDate' => [Rule::requiredIf(request()->query('endDate') != null), 'date_format:Y-m-d'],
            'endDate' => [Rule::requiredIf(request()->query('startDate') != null), 'date_format:Y-m-d'],
            'category' => ['nullable', 'string', Rule::in(TransactionCategoryEnum::WITHDRAWAL->value, TransactionCategoryEnum::DEPOSIT->value)],
            'page' => ['nullable', 'integer', 'min:1'],
            'limit' => ['nullable', 'integer', 'min:10', 'max:100']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
