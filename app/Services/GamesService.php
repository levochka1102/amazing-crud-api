<?php

namespace App\Services;

use App\Helpers\GameHelper;
use App\Http\Resouces\Games\GamesCollection;
use App\Models\Game;

class GamesService
{
    use GameHelper;

    private array $data = [];

    private Game $game;

    /**
     * @param Game $game
     * @return GamesService
     */
    public function setGame(Game $game): GamesService
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @param array $data
     * @return GamesService
     */
    public function setData(array $data): GamesService
    {
        $this->data = $data;
        return $this;
    }

    public function showGames(): GamesCollection
    {
        $prepared = $this->prepareShowData($this->data);

        return new GamesCollection(
            Game::query()
                ->when($prepared['search'],
                    fn($query) => $query->search($prepared['search'])
                )
                ->when($prepared['genres']->isNotEmpty(),
                    fn($query) => $query->searchGenres($prepared['genres'])
                )
                ->when($prepared['developers']->isNotEmpty(),
                    fn($query) => $query->searchDeveloper($prepared['developers'])
                )
                ->when($prepared['limit'],
                    fn($query) => $query->paginate($prepared['limit']),
                    fn($query) => $query->get()
                )
        );
    }

    public function store(): Game
    {
        $prepared = $this->prepareStoreData($this->data);

        $game = Game::create([
            'name' => $prepared['name'],
            'developer_id' => $prepared['developer']->id,
        ]);

        $game->genres()->attach($prepared['genres']);

        return $game;
    }

    public function update(): Game
    {
        $prepared = $this->prepareStoreData($this->data);

        $this->game->update([
            'name' => $prepared['name'],
            'developer_id' => $prepared['developer']->id,
        ]);

        $this->game->genres()->sync($prepared['genres']);

        return $this->game;
    }

    public function destroy(): Game
    {
        $this->game->delete();
        return $this->game;
    }
}
