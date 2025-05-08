<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

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

    public function getTransactionsByUserId(int $userID): Transaction
    {
        return $this->modelQuery()->where('user_id', $userID);
    }
}
