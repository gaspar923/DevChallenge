<?php

namespace App\Application\UseCases\Player;

use App\Domains\Player\DTOs\PlayerDTO;
use App\Domains\Player\Services\PlayerService;

class CreatePlayerUseCase
{
    public function __construct(private PlayerService $playerService) {}

    public function execute(array $data)
    {
        $dto = PlayerDTO::fromArray($data);

        return $this->playerService->createPlayer($dto);
    }
}
