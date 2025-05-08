<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;

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
}
