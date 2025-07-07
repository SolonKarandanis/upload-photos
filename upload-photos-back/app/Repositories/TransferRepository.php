<?php

namespace App\Repositories;

use App\Dtos\TransferDto;
use App\Models\Transfer;
use App\Repositories\TransferRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class TransferRepository implements TransferRepositoryInterface
{

    public function modelQuery(): Builder|Transfer
    {
        return Transfer::query();
    }

    public function createTransfer(TransferDto $transferDto): Transfer
    {
        return $this->modelQuery()->create([
            'sender_id' => $transferDto->getSenderId(),
            'recipient_id' => $transferDto->getRecepientId(),
            'sender_account_id' => $transferDto->getSenderAccountId(),
            'recipient_account_id' => $transferDto->getRecepientAccountId(),
            'reference' => $transferDto->getReference(),
            'status' => $transferDto->getStatus(),
            'amount' => $transferDto->getAmount(),
        ]);
    }

    public function getTransferById(int $transferId): Transfer
    {
        return $this->modelQuery()->whereId('id', $transferId)->first();
    }

    public function getTransferByReference(string $reference): Transfer
    {
        return $this->modelQuery()->where('reference', $reference)->first();
    }
}
