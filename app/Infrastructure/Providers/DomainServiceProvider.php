<?php

namespace App\Infrastructure\Providers;

use App\Domains\Player\Contracts\PlayerRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\PlayerEloquentRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlayerRepositoryInterface::class, PlayerEloquentRepository::class);
    }
}
