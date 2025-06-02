<?php

namespace Tests\Unit\Repositories;

use App\Domains\Player\Models\Player;
use App\Infrastructure\Persistence\Repositories\PlayerEloquentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerEloquentRepositoryTest extends TestCase
{
    use RefreshDatabase; // Resets database after each test

    private PlayerEloquentRepository $playerRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->playerRepository = new PlayerEloquentRepository;
    }

    public function it_can_create_a_player()
    {
        $player = $this->playerRepository->create([
            'name' => 'Leo Messi',
            'age' => 36,
            'team_id' => 1,
        ]);

        $this->assertDatabaseHas('players', ['name' => 'Leo Messi']);
        $this->assertInstanceOf(Player::class, $player);
    }

    public function it_can_find_a_player_by_id()
    {
        $player = Player::factory()->create();
        $foundPlayer = $this->playerRepository->findById($player->id);

        $this->assertNotNull($foundPlayer);
        $this->assertEquals($player->id, $foundPlayer->id);
    }
}
