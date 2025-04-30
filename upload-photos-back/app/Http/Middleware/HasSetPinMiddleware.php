<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\UserService;
use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;

class HasSetPinMiddleware
{
    use ApiResponseTrait;

    public function __construct(public readonly UserService $userService)
    {
    }
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();
        if (!$this->userService->hasSetPin($user)){
            return  $this->sendError('Please set your pin', 401);
        }
        return $next($request);
    }
}
