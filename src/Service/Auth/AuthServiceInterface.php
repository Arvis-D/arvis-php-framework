<?php

namespace App\Service\Auth;

use Symfony\Component\HttpFoundation\Request;

interface AuthServiceInterface
{
    public function login(Request $request): bool;

    public function signup(Request $request): bool;

    public function logout();

    public function authParams(): array;

    public function getAuthErrors(): array;

    public function authenticated(): bool;

    public function roles(): array;
}