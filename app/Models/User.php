<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    // Si tienes fillable, hidden, casts, etc. los dejas aquí.
    protected $fillable = ['name','email','password'];
    protected $hidden   = ['password','remember_token'];

    /**
     * Este método devuelve el "subject" del token (normalmente tu PK).
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Aquí puedes añadir claims personalizados (payload extra). 
     * Si no necesitas nada adicional, devuelves un array vacío.
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
