<?php

namespace App\Services;

use App\Dtos\AccountDto;
use App\Dtos\TransactionDto;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface TransactionServiceInterface
{
    public function createTransaction(TransactionDto $transactionDto): Transaction;

    public function generateReference(): string;

    public function getTransactionByReference(string $reference): Transaction;
    public function getTransactionById(int $transactionID): Transaction;
    public function getTransactionsByAccountNumber(int $accountNumber): Transaction;
    public function getTransactionsByUserIdAndFilter(int $userID,array $filter): Collection;

    public function downloadTransactionHistory(AccountDto $accountDto, Carbon $fromDate, Carbon $endDate): Collection;
}
