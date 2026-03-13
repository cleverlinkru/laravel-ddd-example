<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Contact\DTOs\CreateContactDTO;
use App\Application\Contact\UseCases\CreateContactUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function __construct(
        protected CreateContactUseCase $createContactUseCase,
    )
    {
    }

    public function store(Request $request)
    {
        $dto = new CreateContactDTO(
            name: $request->input('name'),
            email: $request->input('email'),
        );
        $contact = $this->createContactUseCase->execute($dto);
        return Response::json([
            'contact_id' => $contact->getId(),
        ], 201);
    }
}