<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has("page")) {
            $teams = Team::orderBy("name", 'asc');
            // dd($competitions);
            // $name = "";
            if (request()->has("name")) {
                $teams = $teams->where(function ($query) {
                    $name = request("name");
                    $query->where('name', 'like', '%' . $name . '%');
                });
            }
            $teams = $teams->paginate(10)->appends(request()->except("page"));

            return json_encode($teams);
        } else {
            return response()->json(Team::all(), 200);
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
        $team = Team::find($id);
        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }
        return response()->json($team, 200);
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
        return response()->json(Team::all(), 200);
    }
}
