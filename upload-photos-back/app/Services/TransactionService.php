<?php

namespace App\Services;

use App\Dtos\AccountDto;
use App\Dtos\PageRequestDTO;
use App\Dtos\TransactionDto;
use App\Enums\TransactionCategoryEnum;
use App\Exceptions\ANotFoundException;
use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class TransactionService implements TransactionServiceInterface
{

    public function __construct(private readonly TransactionRepositoryInterface $transactionRepository){

    }

    public function createTransaction(TransactionDto $transactionDto): Transaction
    {
        $data = [];
        if ($transactionDto->getCategory() == TransactionCategoryEnum::DEPOSIT->value) {
            $data = $transactionDto->forDepositToArray($transactionDto);
        }
        if ($transactionDto->getCategory() == TransactionCategoryEnum::WITHDRAWAL->value) {
            $data =$transactionDto->forWithdrawalToArray($transactionDto);
        }
        return $this->transactionRepository->createTransaction($data);
    }

    public function generateReference(): string
    {
        return Str::upper('TF' . '/' . Carbon::now()->getTimestampMs() . '/' . Str::random(4));
    }

    public function updateTransactionBalance(string $reference, float|int $balance):void
    {
        $this->transactionRepository->updateBalance($reference, $balance);
    }

    public function updateTransferID(string $reference, int $transferID):void
    {
        $this->transactionRepository->updateTransferID($reference, $transferID);
    }

    /**
     * @throws ANotFoundException
     */
    public function getTransactionByReference(string $reference): Transaction
    {
        $transaction =  $this->transactionRepository->getTransactionByReference($reference);
        if (!$transaction){
            throw new ANotFoundException("transaction with the supplied reference does not exist");
        }
        return $transaction;
    }

    /**
     * @throws ANotFoundException
     */
    public function getTransactionById(int $transactionID): Transaction
    {
        $transaction =  $this->transactionRepository->getTransactionById($transactionID);
        if (!$transaction){
            throw new ANotFoundException("transaction with the supplied id does not exist");
        }
        return $transaction;
    }

    public function getTransactionsByAccountNumber(int $accountNumber): Transaction
    {
        return $this->transactionRepository->getTransactionsByAccountNumber($accountNumber);
    }

    public function getTransactionsByUserIdAndFilter(int $userID,array $filter,PageRequestDTO $pageRequest): LengthAwarePaginator
    {
        return $this->transactionRepository->getTransactionsByUserIdAndFilter($userID, $filter,$pageRequest);
    }

    public function downloadTransactionHistory(AccountDto $accountDto, Carbon $fromDate, Carbon $endDate): Collection
    {
        // TODO: Implement downloadTransactionHistory() method.
    }
}
