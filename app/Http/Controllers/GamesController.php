<?php

namespace App\Http\Controllers;

use App\Facades\Games;
use App\Http\Requests\Games\ShowGamesRequest;
use App\Http\Requests\Games\StoreGamesRequest;
use App\Http\Resouces\Games\GamesCollection;
use App\Http\Resouces\Games\GamesResource;
use App\Models\Game;

class GamesController extends Controller
{

    public function index(ShowGamesRequest $request)
    {
        return Games::setData($request->validated())
            ->showGames();
    }

    public function store(StoreGamesRequest $request)
    {
        return response()->json(
            new GamesResource(
                Games::setData($request->validated())
                    ->store()
            )
        );
    }

    public function show(Game $game)
    {
        return response()->json(
            new GamesResource($game)
        );
    }

    public function update(StoreGamesRequest $request, Game $game)
    {
        return response()->json(
            Games::setData($request->validated())
                ->setGame($game)
                ->update()
        );
    }

    public function destroy(Game $game)
    {
        return response()->json(
            Games::setGame($game)
                ->destroy()
        );
    }
}
