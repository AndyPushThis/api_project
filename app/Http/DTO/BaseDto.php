<?php

namespace App\Http\DTO;


class BaseDto
{
    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}
