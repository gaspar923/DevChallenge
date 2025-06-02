<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\CompetitionTeam;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamPlayer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Team::truncate();
            Player::truncate();
            CompetitionTeam::truncate();
            TeamPlayer::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $competitions = Competition::all();

            for ($i = 0; $i < count($competitions); $i++) {
                if (($i == 0) || ($i > 0) && (($i + 1) % 10 == 0)) {
                    $this->command->info('Pause for 61 seconds!');
                    sleep(61);
                }

                $response = Http::withHeaders([
                    'X-Auth-Token' => env('API_FOOTBALL_DATA_TOKEN'),
                ])->get(env('API_FOOTBALL_DATA_URL').'/competitions/'.$competitions[$i]->id.'/teams');

                if ($response->successful()) {
                    $data = $response->json();

                    foreach ($data['teams'] as $team) {
                        $team_exists = Team::where('id', $team['id'])->exists();

                        if ($team_exists) {
                            //
                        } else {
                            Team::create([
                                'id' => $team['id'],
                                'name' => $team['name'],
                                'shortName' => $team['shortName'],
                                'tla' => $team['tla'],
                                'crest' => $team['crest'],
                                'address' => $team['address'],
                                'website' => $team['website'],
                                'founded' => $team['founded'],
                                'club_colors' => $team['clubColors'],
                                'venue' => $team['venue'],
                            ]);
                        }

                        // To add teams to a competition:
                        $competition = Competition::find($competitions[$i]->id);
                        $competition->teams()->attach([$team['id']]);

                        $this->savePlayers($team['squad'], $team['id']);
                    }

                    $this->command->info('Team seeded successfully!');
                } elseif ($response->failed()) {
                    $this->command->error('Failed to seed Team: '.$response->body());
                }
            }
        } catch (\Exception $e) {
            $this->command->error('Failed to seed Team: '.$e->getMessage());
        }

        // php artisan db:seed --class=TeamSeeder
    }

    public function savePlayers($players, $team_id)
    {
        // foreach ($team['squad'] as $player) {
        foreach ($players as $player) {
            $player_exists = Player::where('id', $player['id'])->exists();

            if ($player_exists) {
                //
            } else {
                Player::create([
                    'id' => $player['id'],
                    'name' => $player['name'],
                    'position' => $player['position'],
                    'date_of_birth' => $player['dateOfBirth'],
                    'nationality' => $player['nationality'],
                ]);

                // To add players to a team:
                $team = Team::find($team_id);
                $team->players()->attach([$player['id']]);

                $this->command->info('Player seeded successfully!');
            }
        }
    }
}
