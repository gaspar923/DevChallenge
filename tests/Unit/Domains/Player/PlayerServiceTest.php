<?php

// namespace Tests\Unit\Services;

// use App\Domains\Player\Services\PlayerService;
// use App\Domains\Player\DTOs\PlayerDTO;
// use App\Domains\Player\Contracts\PlayerRepositoryInterface;
// use App\Domains\Player\Models\Player;
// use Mockery;
// use Tests\TestCase;

// class PlayerServiceTest extends TestCase
// {
//     private $playerRepository;
//     private PlayerService $playerService;

//     protected function setUp(): void
//     {
//         parent::setUp();
//         $this->playerRepository = Mockery::mock(PlayerRepositoryInterface::class);
//         $this->playerService = new PlayerService($this->playerRepository);
//     }

//     public function it_can_create_a_player()
//     {
//         $dto = new PlayerDTO('Cristiano Ronaldo', 39, 2);
//         $mockPlayer = new Player(['name' => 'Cristiano Ronaldo', 'age' => 39, 'team_id' => 2]);

//         $this->playerRepository
//             ->shouldReceive('create')
//             ->once()
//             ->with([
//                 'name' => 'Cristiano Ronaldo',
//                 'age' => 39,
//                 'team_id' => 2
//             ])
//             ->andReturn($mockPlayer);

//         $player = $this->playerService->createPlayer($dto);

//         $this->assertEquals('Cristiano Ronaldo', $player->name);
//     }
// }

use App\Domains\Player\Services\PlayerService;
use App\Domains\Player\DTOs\PlayerDTO;
use App\Domains\Player\Contracts\PlayerRepositoryInterface;
use App\Domains\Player\Models\Player;
// use Mockery;
// use function Pest\Laravel\mock;

beforeEach(function () {
    $this->playerRepository = Mockery::mock(PlayerRepositoryInterface::class);
    $this->playerService = new PlayerService($this->playerRepository);
});

it('can create a player', function () {
    $dto = new PlayerDTO('Cristiano Ronaldo', 39, 2);
    $mockPlayer = new Player(['name' => 'Cristiano Ronaldo', 'age' => 39, 'team_id' => 2]);

    $this->playerRepository
        ->shouldReceive('create')
        ->once()
        ->with([
            'name' => 'Cristiano Ronaldo',
            'age' => 39,
            'team_id' => 2
        ])
        ->andReturn($mockPlayer);

    $player = $this->playerService->createPlayer($dto);

    expect($player->name)->toBe('Cristiano Ronaldo');
});
