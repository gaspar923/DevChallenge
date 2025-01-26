<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has("page")) {
            $players = Player::orderBy("name", 'asc');
            // dd($players);
            // $name = "";
            if (request()->has("name")) {
                $players = $players->where(function ($query) {
                    $name = request("name");
                    $query->where('name', 'like', '%' . $name . '%');
                });
            }
            $players = $players->paginate(10)->appends(request()->except("page"));

            return json_encode($players);
        } else {
            return response()->json(Player::all(), 200);
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function all()
    {
        return response()->json(Player::all(), 200);
    }
}
