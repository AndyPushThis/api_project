<?php

namespace App\Http\DTO;

class PostData extends BaseDto
{
    public function __construct(
        public string $title,
        public string $description,
        public int|null $id
    )
    {
    }
}
