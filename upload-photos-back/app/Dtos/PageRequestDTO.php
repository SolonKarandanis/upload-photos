<?php

namespace App\Dtos;

class PageRequestDTO
{

    public function __construct(int $pageNumber, int $pageSize){
        $this->page = $pageNumber ?: 0;
        $this->limit = $pageSize ?: 10;
    }
    protected array $safeParams =[
        'page'=>['eq'],
        'limit'=>['eq'],
    ];

    private int $page;
    private int $limit;

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }


}
