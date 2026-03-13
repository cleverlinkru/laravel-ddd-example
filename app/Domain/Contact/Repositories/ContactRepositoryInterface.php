<?php

namespace App\Domain\Contact\Repositories;

use App\Domain\Contact\Entities\Contact;

interface ContactRepositoryInterface
{
    public function save(Contact $contact): void;

    public function find(string $id): ?Contact;
}