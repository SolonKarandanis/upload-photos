<?php

namespace App\Repositories;

use App\Dtos\PageRequestDTO;
use App\Models\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function getTransactionsByUserIdAndFilter(int $userID,array $filter, PageRequestDTO $pageRequest): LengthAwarePaginator;

    public function getTransactionsByUserIds(array $userIds): Collection;

    public function getTransactionsByCreatedAtBetween(string $createdAtFrom, string $createdAtTo): Collection;

    public function restoreTransactionsByUserId(int $userID): void;
}
