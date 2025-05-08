<?php

namespace App\Repositories;

use App\Dtos\TransferDto;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Builder;

interface TransferRepositoryInterface
{
    public function modelQuery(): Builder;

    public function createTransfer(TransferDto $transferDto): Transfer;

    public function getTransferById(int $transferId): Transfer;

    public function getTransferByReference(string $reference): Transfer;
}
