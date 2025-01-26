<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has("page")) {
            $competitions = Competition::orderBy("name", 'asc');
            // dd($competitions);
            // $name = "";
            if (request()->has("name")) {
                $competitions = $competitions->where(function ($query) {
                    $name = request("name");
                    $query->where('name', 'like', '%' . $name . '%');
                });
            }
            $competitions = $competitions->paginate(10)->appends(request()->except("page"));

            return json_encode($competitions);
        } else {
            return response()->json(Competition::all(), 200);
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
        return response()->json(Cache::remember('competition_' . $id, now()->addMinutes(10), function () use ($id) {
            $competition = Competition::where('id', '=', $id)
                ->with('teams.players')
                ->first();

            if (!$competition) {
                return response()->json(['error' => 'Competition not found'], 404);
            }

            return response()->json($competition, 200);
        }));

        // $competition = Competition::where('id', '=', $id)
        //     ->with('teams.players')
        //     ->first();

        // if (!$competition) {
        //     return response()->json(['error' => 'Competition not found'], 404);
        // }

        // return response()->json($competition, 200);
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

    // public function all()
    // {
    //     return response()->json(Competition::all(), 200);
    // }
}
