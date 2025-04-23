<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{

    public function  createUser(UserDto  $userDto): Builder |Model;
    public function  getUserById(int $userId): Builder|Model;
}
