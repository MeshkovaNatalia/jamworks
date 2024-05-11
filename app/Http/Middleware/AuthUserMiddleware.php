<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthUserMiddleware
{
    public function __construct(
        private UserServiceInterface $userService,
    ) {
    }

    /**
     * This is a stub to impersonate an authenticated user
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $this->userService->getUser(1);

        Auth::login($user);

        return $next($request);
    }
}
