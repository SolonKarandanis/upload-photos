<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface TransactionRepositoryInterface
{
    public function modelQuery(): Builder;

    public function createTransaction(array $data): Transaction;

    public function updateBalance(string $reference, float|int $balance);

    public function updateTransferID(string $reference, int $transferID);

    public function getTransactionByReference(string $reference): Transaction;

    public function getTransactionById(int $transactionID): Transaction;

    public function getTransactionsByAccountNumber(int $accountNumber): Transaction;

    public function getTransactionsByUserId(int $userID): Transaction;

    public function getTransactionsByUserIds(array $userIds): Collection;

    public function getTransactionsByCreatedAtBetween(string $createdAtFrom, string $createdAtTo): Collection;

    public function restoreTransactionsByUserId(int $userID): void;
}
