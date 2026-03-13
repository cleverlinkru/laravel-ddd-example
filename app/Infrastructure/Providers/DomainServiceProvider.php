<?php

namespace App\Infrastructure\Providers;

use App\Domain\Contact\Repositories\ContactRepositoryInterface;
use App\Infrastructure\Database\Repositories\EloquentContactRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ContactRepositoryInterface::class,
            EloquentContactRepository::class,
        );
    }
}