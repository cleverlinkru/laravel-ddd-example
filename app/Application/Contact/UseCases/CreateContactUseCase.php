<?php

namespace App\Application\Contact\UseCases;

use App\Application\Contact\DTOs\CreateContactDTO;
use App\Domain\Contact\Entities\Contact;
use App\Domain\Contact\Services\ContactService;

class CreateContactUseCase
{
    public function __construct(
        protected ContactService $contactService,
    )
    {
    }

    public function execute(CreateContactDTO $dto): Contact
    {
        return $this->contactService->createContact(
            name: $dto->name,
            email: $dto->email,
        );
    }
}