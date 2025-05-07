<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    public function createUser(UserDto $userDto): Builder|User
    {
        return User::query()->create([
            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(),
            'phone_number' => $userDto->getPhoneNumber(),
        ]);
    }

    public function getUserById(int $userId): Builder|User
    {
        return User::query()->where('id', $userId)->first();
    }

    public function getUsersWithPostCounts(): Builder|Collection
    {
        return User::query()->withCount([
            'posts',
            'posts as laravel_posts_count' => function (Builder $query) {
                $query->where('title', 'LIKE', '%laravel_posts_count%');
            }
        ])->get();
    }
}
