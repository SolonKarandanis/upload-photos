<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;

class AccountRepository implements AccountRepositoryInterface
{

    public function modelQuery(): Builder|Account
    {
        return Account::query();
    }

    public function hasAccountNumber(int $userId): bool
    {
        return $this->modelQuery()->where('user_id', $userId)->exists();
    }

    public function accountExists(string $accountNumber): bool
    {
        return $this->modelQuery()->where('account_number', $accountNumber)->exists();
    }

    public function createAccountNumber(int $userId, string $accountNumber): Account
    {
        return $this->modelQuery()->create([
            'user_id' => $userId,
            'account_number'=> $accountNumber
        ]);
    }

    public function getAccountByAccountNumber(string $accountNumber): Account
    {
        return $this->modelQuery()->where('account_number', $accountNumber)->first();
    }

    public function getAccountByUserID(int $userID): Account
    {
        return $this->modelQuery()->where('user_id', $userID)->first();
    }

    public function getAccountForUpdate(string $accountNumber): Account
    {
        return $this->modelQuery()->where('account_number', $accountNumber)->lockForUpdate()->first();
    }
}
