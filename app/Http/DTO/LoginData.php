<?php

namespace App\Http\DTO;

class LoginData extends BaseDto
{
    public function __construct(
        public string $email,
        public string $password
    )
    {
    }
}
