<?php

namespace App\Repositories\Queries;

class TransactionQuery
{

    protected $safeParams =[
        'userId'=> ['eq'],
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

    protected $columnMap=[
        'userId'=>'user_id',
        'accountId'=>'account_id',
        'transferId'=>'transfer_id',
        'amount'=>'amount',
        'balance'=>'balance',
        'category'=>'category',
        'createdAt'=>'created_at',
        'updatedAt'=>'updated_at',
    ];

    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'gte'=>'>',
        'lte'=>'<=',
        'gt'=>'>=',
    ];

    public function transform(){

    }
}
