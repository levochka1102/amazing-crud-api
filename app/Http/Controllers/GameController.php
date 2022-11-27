<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameIndexRequest;
use App\Http\Requests\StoreGameRequest;
use App\Http\Resouces\GameCollection;
use App\Http\Resouces\GameResource;
use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(GameIndexRequest $request)
    {
        $validated = $request->validated();
        $genresIds = array_filter(explode(', ', $validated['genres_ids']));
        $developersIds = array_filter(explode(', ', $validated['developers_ids']));
        $search = $validated['search'];
        return new GameCollection(Game::query()
            ->when($search, fn($query) => $query->search($search))
            ->when($genresIds, fn($query) => $query->whereHasGenresIds($genresIds))
            ->when($developersIds, fn($query) => $query->whereHasDevelopersIds($developersIds))
            ->paginate($validated['limit'])
        );
    }

    public function store(StoreGameRequest $request)
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
        return new GameResource($game);
    }

    public function update(StoreGameRequest $request, Game $game)
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
