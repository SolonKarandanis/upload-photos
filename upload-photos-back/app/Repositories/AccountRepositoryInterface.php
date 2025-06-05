<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;

interface AccountRepositoryInterface
{
    public function modelQuery(): Builder|Account;

    public function hasAccountNumber(int $userId): bool;

    public function accountExists(string $accountNumber): bool;

    public function createAccountNumber(int $userId, string $accountNumber): Account;

    public function getAccountByAccountNumber(string $accountNumber): Account;

    public function getAccountByUserID(int $userID): Account;

    public function getAccountForUpdate(string $accountNumber):Account;


}
