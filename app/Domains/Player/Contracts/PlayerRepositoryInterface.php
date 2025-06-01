<?php

namespace App\Domains\Player\Contracts;

use App\Domains\Player\Models\Player;

interface PlayerRepositoryInterface
{
    public function create(array $data): Player;
    public function findById(int $id): ?Player;
}
