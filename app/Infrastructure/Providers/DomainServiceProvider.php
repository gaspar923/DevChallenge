<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Player\Contracts\PlayerRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\PlayerEloquentRepository;

class DomainServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlayerRepositoryInterface::class, PlayerEloquentRepository::class);
    }
}
