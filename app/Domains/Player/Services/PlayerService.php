<?php

namespace App\Domains\Player\Services;

use App\Domains\Player\Contracts\PlayerRepositoryInterface;
use App\Domains\Player\DTOs\PlayerDTO;
use App\Domains\Player\Models\Player;

class PlayerService
{
    public function __construct(private PlayerRepositoryInterface $playerRepository) {}

    public function createPlayer(PlayerDTO $dto): Player
    {
        return $this->playerRepository->create([
            'name' => $dto->name,
            'age' => $dto->age,
            'team_id' => $dto->teamId,
        ]);
    }
}
