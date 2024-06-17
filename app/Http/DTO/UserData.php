<?php

namespace App\Http\DTO;


class UserData extends BaseDto
{
    public function __construct(
        public null|string $name,
        public string $email,
        public string $password
    )
    {
    }
}
