<?php

namespace App\Services;

use App\Dtos\AccountDto;
use App\Dtos\TransferDto;
use App\Exceptions\ANotFoundException;
use App\Models\Transfer;
use App\Repositories\TransferRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransferService implements TransferServiceInterface
{

    public function __construct(private readonly TransferRepositoryInterface $transferRepository){}

    public function createTransfer(TransferDto $transferDto): Transfer
    {
        return $this->transferRepository->createTransfer($transferDto);
    }

    public function getTransfersBetweenAccount(AccountDto $firstAccountDto, AccountDto $secondAccountDto): array
    {
        // TODO: Implement getTransfersBetweenAccount() method.
    }

    public function generateReference(): string
    {
        return Str::upper('TRF' . '/' . Carbon::now()->getTimestampMs() . '/' . Str::random(4));
    }

    /**
     * @throws ANotFoundException
     */
    public function getTransferById(int $transferId): Transfer
    {
        $transfer = $this->transferRepository->getTransferById($transferId);
        if (!$transfer) {
            throw new ANotFoundException("Transfer not found");
        }
        return $transfer;
    }

    /**
     * @throws ANotFoundException
     */
    public function getTransferByReference(string $reference): Transfer
    {
        $transfer = $this->transferRepository->getTransferByReference($reference);
        if (!$transfer) {
            throw new ANotFoundException("Transfer  with supplier reference not found");
        }
        return $transfer;
    }
}
