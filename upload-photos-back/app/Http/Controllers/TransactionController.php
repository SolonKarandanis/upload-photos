<?php

namespace App\Http\Controllers;

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
        $transactionBuilder = $this->transactionService->modelQuery()
            ->when($request->query('category'), function ($query, $category){
                $query->where('category', $category);
            })->when($request->query('start_date'), function ($query, $start_date) use ($request){
                $end_date = $request->query('end_date');
                $query->whereDate('date', '>=', $start_date)->whereDate('date','<=', $end_date);
            });
        $transactionBuilder =  $this->transactionService->getTransactionsByUserId($user->id);
        return $this->sendSuccess(['transactions' => $transactionBuilder->paginate($request->query('per_page', 15))]);
    }
}
