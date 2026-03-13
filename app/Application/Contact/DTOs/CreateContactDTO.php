<?php

namespace App\Application\Contact\DTOs;

class CreateContactDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    )
    {
    }
}