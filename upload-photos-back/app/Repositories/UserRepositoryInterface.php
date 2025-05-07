<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{

    public function  createUser(UserDto  $userDto): Builder |User;
    public function  getUserById(int $userId): Builder|User;

    public function getUsersWithPostCounts():Builder| Collection;
}
