<?php

namespace App\Repositories;

use App\Dtos\PageRequestDTO;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function modelQuery(): Builder|Transaction
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
        return $this->modelQuery()->whereRelation('account','account_number',$accountNumber )->first();
    }

    public function getTransactionsByUserIdAndFilter(int $userID,array $filter, PageRequestDTO $pageRequest): LengthAwarePaginator
    {
        return $this->modelQuery()
            ->where('user_id', $userID)
            ->where($filter)
            ->paginate(perPage: $pageRequest->getLimit(), page: $pageRequest->getPage());
    }

    //        $transactionBuilder = $this->transactionService->modelQuery()
//            ->when($request->query('category'), function ($query, $category){
//                $query->where('category', $category);
//            })->when($request->query('start_date'), function ($query, $start_date) use ($request){
//                $end_date = $request->query('end_date');
//                $query->whereDate('date', '>=', $start_date)->whereDate('date','<=', $end_date);
//            });

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

    public function getTransationsOrderedByUsername(): Collection
    {
        return $this->modelQuery()->select(['transactions.*', 'users.name as user_name'])
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->orderBy('users.name' )
            ->get();
    }
}
