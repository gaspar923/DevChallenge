<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Player/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        if ($player->shirt_number == null) {
            $player = $this->editShirtNumber($player);

            return Inertia::render('Player/Show', compact('player'));
        } else {
            return Inertia::render('Player/Show', compact('player'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }

    public function editShirtNumber($player)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('API_FOOTBALL_DATA_TOKEN'),
        ])->get(env('API_FOOTBALL_DATA_URL').'/persons/'.$player->id);

        if ($response->successful()) {
            $data = $response->json();
            $player = Player::find($data['id']);
            $player->update(['shirt_number' => $data['shirtNumber']]);

            // $this->command->info('Player seeded successfully!');
        } elseif ($response->failed()) {
            // $this->command->error('Failed to seed Player: ' . $response->body());
        }

        return $player;
    }
}
