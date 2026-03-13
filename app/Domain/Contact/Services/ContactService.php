<?php

namespace App\Domain\Contact\Services;

use App\Domain\Contact\Entities\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;

class ContactService
{
    public function __construct(
        protected ContactRepositoryInterface $contactRepository,
    )
    {
    }

    public function createContact(
        string $name,
        string $email,
    ): Contact
    {
        $contact = new Contact(
            id: uniqid(),
            name: $name,
            email: $email,
        );
        $this->contactRepository->save($contact);
        return $contact;
    }

    public function updateContactStatus(
        string $contactId,
        string $status,
    ): void
    {
        /** @var Contact $contact */
        $contact = $this->contactRepository->find($contactId);
        $contact->updateStatus($status);
        $this->contactRepository->save($contact);
    }
}