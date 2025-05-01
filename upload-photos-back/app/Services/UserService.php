<?php

namespace App\Services;

use App\Dtos\UserDto;
use App\Exceptions\InvalidPinLengthException;
use App\Exceptions\PinHasAlreadyBeenSetException;
use App\Exceptions\PinNotSetException;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{

    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function createUser(UserDto $userDto): Builder|User
    {
        return $this->userRepository->createUser($userDto);
    }

    /**
     * @param int $userId
     * @return Builder|Model
     */
    public function getUserById(int $userId): Builder|User
    {
        $user = $this->userRepository->getUserById($userId);
        if (!$user) {
            throw new ModelNotFoundException("User not found");
        }
        return $user;
    }

    /**
     * @param User $user
     * @param string $pin
     * @return void
     * @throws InvalidPinLengthException
     * @throws PinHasAlreadyBeenSetException
     */
    public function setupPin(User $user, string $pin): void
    {
        if ($this->hasSetPin($user)) {
            throw new PinHasAlreadyBeenSetException("Pin has already been set");
        }
        if (strlen($pin) != 4) {
            throw new InvalidPinLengthException();
        }
        $user->pin = Hash::make($pin);
        $user->save();
    }

    /**
     * @param string $pin
     * @return bool
     * @throws PinNotSetException
     */
    public function validatePin(int $userId, string $pin): bool
    {
        $user = $this->getUserById($userId);
        if (!$this->hasSetPin($user)) {
            throw new PinNotSetException("Please set your pin");
        }
        return Hash::check($pin, $user->pin);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function hasSetPin(User $user): bool
    {
        return $user->pin != null;
    }
}
