<?php

namespace App\Http\Controllers;

use App\Http\Requests\Games\GamesIndexRequest;
use App\Http\Requests\Games\StoreGamesRequest;
use App\Http\Resouces\Games\GamesCollection;
use App\Http\Resouces\Games\GamesResource;
use App\Models\Game;

class GamesController extends Controller
{
    public function index(GamesIndexRequest $request)
    {
        $validated = $request->validated();
        $genresIds = array_filter(explode(', ', $validated['genres_ids']));
        $developersIds = array_filter(explode(', ', $validated['developers_ids']));
        $search = $validated['search'];
        return new GamesCollection(Game::query()
            ->when($search, fn($query) => $query->search($search))
            ->when($genresIds, fn($query) => $query->whereHasGenresIds($genresIds))
            ->when($developersIds, fn($query) => $query->whereHasDevelopersIds($developersIds))
            ->paginate($validated['limit'])
        );
    }

    public function store(StoreGamesRequest $request)
    {
        $validated = $request->validated();
        $game = Game::create([
            'name' => $validated['name'],
            'developer_id' => (int)$validated['developer_id'],
        ]);
        $game->genres()->attach(explode(', ', $validated['genres_ids']));
        return response()->json("Game was created");
    }

    public function show(Game $game)
    {
        return new GamesResource($game);
    }

    public function update(StoreGamesRequest $request, Game $game)
    {
        $validated = $request->validated();
        $game->update([
            'name' => $validated['name'],
            'developer_id' => $validated['developer_id'],
        ]);
        $game->genres()->sync(explode(', ', $validated['genres_ids']));
        return response()->json("Game was updated");
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json("Game was deleted");
    }
}
