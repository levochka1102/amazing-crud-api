<?php

namespace App\Facades;

use App\Services\GamesService;
use Illuminate\Support\Facades\Facade;

/**
 * @method GamesService setData(array $data)
 * @method GamesService showGames()
 */
class Games extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'games';
    }
}
