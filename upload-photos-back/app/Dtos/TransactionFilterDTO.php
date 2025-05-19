<?php

namespace App\Dtos;

use App\Http\Requests\Account\FilterTransactionsRequest;

class TransactionFilterDTO
{

    protected array $safeParams =[
        'accountId'=> ['eq'],
        'transferId'=> ['eq'],
        'amount'=> ['eq','gt','gte','lt','lte'],
        'balance'=> ['eq','gt','gte','lt','lte'],
        'category'=> ['eq'],
        'createdAt'=> ['eq','gt','gte','lt','lte'],
        'updatedAt'=> ['eq','gt','gte','lt','lte'],
        'page'=>['eq'],
        'limit'=>['eq'],
    ];

    protected array $columnMap=[
        'accountId'=>'account_id',
        'transferId'=>'transfer_id',
        'amount'=>'amount',
        'balance'=>'balance',
        'category'=>'category',
        'createdAt'=>'created_at',
        'updatedAt'=>'updated_at',
    ];

    protected array $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'gte'=>'>',
        'lte'=>'<=',
        'gt'=>'>=',
    ];

    public function transform(FilterTransactionsRequest $request): array
    {
        $query = [];
        foreach ($this->safeParams as $param => $operators) {
           $query = $request->query($param);

           if(!isset($query)){
               continue;
           }

           $column = $this->columnMap[$param] ?? $param;

           foreach ($operators as $operator) {
               if(isset($query[$operator])){
                   $query[]=[$column, $this->operatorMap[$operator], $query[$operator]];  // [['column','operator','value']]
               }
           }
        }
        return $query;
    }
}
