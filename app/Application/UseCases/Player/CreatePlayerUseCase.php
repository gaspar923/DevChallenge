<?php

namespace App\Application\UseCases\Player;

use App\Domains\Player\Services\PlayerService;
use App\Domains\Player\DTOs\PlayerDTO;

class CreatePlayerUseCase
{
    public function __construct(private PlayerService $playerService) {}

    public function execute(array $data)
    {
        $dto = PlayerDTO::fromArray($data);
        return $this->playerService->createPlayer($dto);
    }
}
