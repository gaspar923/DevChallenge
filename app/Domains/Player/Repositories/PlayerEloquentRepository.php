<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domains\Player\Contracts\PlayerRepositoryInterface;
use App\Domains\Player\Models\Player;

class PlayerEloquentRepository implements PlayerRepositoryInterface
{
    public function create(array $data): Player
    {
        return Player::create($data);
    }

    public function findById(int $id): ?Player
    {
        return Player::find($id);
    }
}
