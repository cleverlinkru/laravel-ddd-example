<?php

namespace App\Infrastructure\Database\Repositories;

use App\Domain\Contact\Entities\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;
use App\Models\Contact as EloquentContact;

class EloquentContactRepository implements ContactRepositoryInterface
{
    public function save(Contact $contact): void
    {
        EloquentContact::updateOrCreate(
            ['id' => $contact->getId()],
            [
                'name' => $contact->getName(),
                'email' => $contact->getEmail(),
                'status' => $contact->getStatus(),
            ],
        );
    }

    public function find(string $id): ?Contact
    {
        $eloquentContact = EloquentContact::find($id);
        if (!$eloquentContact) {
            return null;
        }
        return new Contact(
            id: $eloquentContact->id,
            name: $eloquentContact->name,
            email: $eloquentContact->email,
            status: $eloquentContact->status,
        );
    }
}