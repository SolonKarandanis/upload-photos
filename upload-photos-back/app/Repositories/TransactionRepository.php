<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function modelQuery(): Builder
    {
        return Transaction::query();
    }

    public function createTransaction(array $data): Transaction
    {
        return $this->modelQuery()->create($data);
    }

    public function updateBalance(string $reference, float|int $balance):void
    {
        $this->modelQuery()->where('reference', $reference)->update([
            'balance' => $balance,
            'confirmed' => true
        ]);
    }

    public function updateTransferID(string $reference, int $transferID):void
    {
        $this->modelQuery()->where('reference', $reference)->update([
            'transfer_id' => $transferID
        ]);
    }

    public function getTransactionByReference(string $reference): Transaction
    {
        return $this->modelQuery()->where('reference', $reference)->first();
    }

    public function getTransactionById(int $transactionID): Transaction
    {
        return $this->modelQuery()->where('id', $transactionID)->first();
    }

    public function getTransactionsByAccountNumber(int $accountNumber): Transaction
    {
        return $this->modelQuery()->whereHas('account', function ($query) use ($accountNumber){
            $query->where('account_number', $accountNumber);
        })->first();
    }

    public function getTransactionsByUserIdAndFilter(int $userID,array $filter): Collection
    {
        return $this->modelQuery()->where('user_id', $userID);
    }

    public function getTransactionsByUserIds(array $userIds): Collection
    {
        return $this->modelQuery()->whereIntegerInRaw('user_id', $userIds)->get();
    }

    public function getTransactionsByCreatedAtBetween(string $createdAtFrom, string $createdAtTo): Collection
    {
        return $this->modelQuery()->whereBetween('created_at', [$createdAtFrom, $createdAtTo])->get();
    }

    public function restoreTransactionsByUserId(int $userID): void
    {
        Transaction::onlyTrashed()->where('user_id',$userID)->restore();
    }
}
