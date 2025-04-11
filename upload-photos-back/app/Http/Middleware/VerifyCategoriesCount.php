<?php

namespace App\Http\Middleware;

use App\Models\Categories;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $count = Categories::count();
        if($count ===0){
            return response()->json(['message' => 'You must first create some Categories'], 409);
        }
        return $next($request);
    }
}
