<?php

namespace App\Common;

use Illuminate\Contracts\Auth\Authenticatable;

class LaravelUser implements Authenticatable
{
    public readonly string $name;
    public readonly string $email;

    public function __construct(
        public array $user = [],
    )
    {
        $this->name = $user['name'];
        $this->email = $user['email'];
    }

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->user['id'];
    }

    public function getAuthPasswordName()
    {
        return $this->user['password'];
    }

    public function getAuthPassword()
    {
        return $this->user['remember_token'];

    }

    public function getRememberToken()
    {

    }

    public function setRememberToken($value)
    {
        return 'remember_token';

    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
