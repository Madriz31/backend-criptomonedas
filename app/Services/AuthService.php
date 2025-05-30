<?php
namespace App\Services;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Auth\AuthenticationException;

class AuthService
{
    public function login(array $credentials): string
    {
        if (! $token = JWTAuth::attempt($credentials)) {
            throw new AuthenticationException('Credenciales inválidas');
        }
        return $token;
    }
}
