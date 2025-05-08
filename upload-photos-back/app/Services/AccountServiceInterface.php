<?php

namespace App\Services;

use App\Dtos\AccountDto;
use App\Dtos\DepositDto;
use App\Dtos\TransactionDto;
use App\Dtos\TransferDto;
use App\Dtos\UserDto;
use App\Dtos\WithdrawDto;
use App\Models\Account;

interface AccountServiceInterface
{

    public function createAccountNumber(UserDto $userDto): Account;

    public function getAccountByAccountNumber(string $accountNumber): Account;

    public function getAccountByUserID(int $userID): Account;


    public function deposit(DepositDto $depositDto): TransactionDto;

    public function withdraw(WithdrawDto $withdrawDto): TransactionDto;

    public function transfer(string $senderAccountNumber, string $receiverAccountNumber,
                             string $senderAccountPin, int|float $amount, string $description = null): TransferDto;

    public function canWithdraw(AccountDto $accountDto, WithdrawDto $withdrawDto): bool;
    public function accountExist(string $accountNumber): void;

}
