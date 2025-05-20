<?php

namespace App\Http\Controllers;

use App\Dtos\PageRequestDTO;
use App\Dtos\TransactionFilterDTO;
use App\Http\Requests\Account\FilterTransactionsRequest;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService)
    {
    }
    public function index(FilterTransactionsRequest $request){
        $user = $request->user();
        $filter = new TransactionFilterDTO();
        $query = $filter->transform($request);
        $pageRequest = new PageRequestDTO($request->query('page'), $request->query('limit'));
        $result =  $this->transactionService->getTransactionsByUserIdAndFilter($user->id,$query,$pageRequest);
        return $this->sendSuccess(['transactions' => $result]);
    }
}
