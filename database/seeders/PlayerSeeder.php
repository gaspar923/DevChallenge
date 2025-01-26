<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $players = Player::all();
            for ($i = 0; $i < count($players); $i++) {
                if (($i == 0) || ($i > 0) && (($i + 1) % 10 == 0)) {
                    $this->command->info('Pause for 61 seconds!');
                    sleep(61);
                }

                $response = Http::withHeaders([
                    'X-Auth-Token' => env('API_FOOTBALL_DATA_TOKEN'),
                ])->get(env('API_FOOTBALL_DATA_URL') . '/persons/' . $players[$i]->id);

                if ($response->successful()) {
                    $data = $response->json();
                    $player = Player::find($data['id']);
                    $player->update(['shirt_number' => $data['shirtNumber']]);

                    $this->command->info('Player seeded successfully!');
                } elseif ($response->failed()) {
                    $this->command->error('Failed to seed Player: ' . $response->body());
                }
            }
        } catch (\Exception $e) {
            $this->command->error('Failed to seed Player: ' . $e->getMessage());
        }

        // php artisan db:seed --class=PlayerSeeder
    }
}
