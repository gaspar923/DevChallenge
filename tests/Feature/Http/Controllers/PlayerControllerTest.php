<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_player()
    {
        $data = [
            'name' => 'Neymar Jr',
            'age' => 32,
            'team_id' => 1,
        ];

        $response = $this->postJson('/api/players', $data);

        $response->assertStatus(201)
            ->assertJson(['name' => 'Neymar Jr']);

        $this->assertDatabaseHas('players', ['name' => 'Neymar Jr']);
    }
}
