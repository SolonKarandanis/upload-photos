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
            'start_date' => [Rule::requiredIf(request()->query('end_date') != null), 'date_format:Y-m-d'],
            'end_date' => [Rule::requiredIf(request()->query('start_date') != null), 'date_format:Y-m-d'],
            'category' => ['nullable', 'string', Rule::in(TransactionCategoryEnum::WITHDRAWAL->value, TransactionCategoryEnum::DEPOSIT->value)],
            'per_page' => ['nullable', 'integer', 'min:10', 'max:100']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
