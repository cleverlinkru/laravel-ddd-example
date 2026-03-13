<?php

namespace App\Domain\Contact\Entities;

class Contact
{
    public function __construct(
        protected readonly string $id,
        protected readonly string $name,
        protected readonly string $email,
        protected string $status = 'active',
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function updateStatus(string $status): void
    {
        $this->status = $status;
    }
}