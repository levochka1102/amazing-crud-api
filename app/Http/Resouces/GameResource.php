<?php

namespace App\Http\Resouces;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Game */
class GameResource extends JsonResource
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
            'developer' => new DeveloperResource($this->developer),
            'genres' => new GenreCollection($this->genres),
        ];
    }
}
