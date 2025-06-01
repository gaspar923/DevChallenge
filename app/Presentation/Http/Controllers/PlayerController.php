<?php

namespace App\Presentation\Http\Controllers;

use App\Application\UseCases\Player\CreatePlayerUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(private CreatePlayerUseCase $createPlayerUseCase) {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'team_id' => 'required|integer|exists:teams,id',
        ]);

        return response()->json($this->createPlayerUseCase->execute($data), 201);
    }
}
