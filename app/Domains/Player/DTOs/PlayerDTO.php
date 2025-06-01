<?php

namespace App\Domains\Player\DTOs;

class PlayerDTO
{
    public function __construct(
        public string $name,
        public int $age,
        public int $teamId
    ) {}

    public static function fromArray(array $data): self
    {
        return new self($data['name'], $data['age'], $data['team_id']);
    }
}
