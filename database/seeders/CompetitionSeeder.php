<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Competition::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        try {
            $response = Http::withHeaders([
                'X-Auth-Token' => env('API_FOOTBALL_DATA_TOKEN'),
            ])->get(env('API_FOOTBALL_DATA_URL').'/competitions');

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data['competitions'] as $competition) {
                    Competition::create([
                        'id' => $competition['id'],
                        'name' => $competition['name'],
                        'code' => $competition['code'],
                        'type' => $competition['type'],
                        'emblem' => $competition['emblem'],
                        'plan' => $competition['plan'],
                        'number_of_available_seasons' => $competition['numberOfAvailableSeasons'],
                    ]);
                }
                $this->command->info('Competition seeded successfully!');
            } elseif ($response->failed()) {
                $this->command->error('Failed to seed Competition: '.$response->body());
            }
        } catch (\Exception $e) {
            $this->command->error('Failed to seed Competition: '.$e->getMessage());
        }

        // php artisan db:seed --class=CompetitionSeeder
    }
}
