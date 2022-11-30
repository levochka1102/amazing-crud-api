<?php

namespace App\Http\Resouces\Games;

use App\Http\Resouces\Developers\DevelopersResource;
use App\Http\Resouces\Genres\GenresCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Game */
class GamesResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'developer' => new DevelopersResource($this->developer),
            'genres' => new GenresCollection($this->genres),
        ];
    }
}
