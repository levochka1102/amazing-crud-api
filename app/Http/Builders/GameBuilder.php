<?php

namespace App\Http\Builders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GameBuilder extends Builder
{
    /**
     * @param string $name
     * @return $this
     */
    public function search(string $name): self
    {
        return $this->where('name', 'like', '%' . $name . '%');
    }

    /**
     * @param Collection $collection
     * @return $this
     */
    public function searchGenres(Collection $collection): self
    {
        return $this->whereHas('genres', function (Builder $genres) use ($collection) {
            $genres->whereIn('id', $collection->pluck('id'));
        });
    }

    /**
     * @param Collection $collection
     * @return $this
     */
    public function searchDeveloper(Collection $collection): self
    {
        return $this->whereHas('developer', function (Builder $genres) use ($collection) {
            $genres->whereIn('id', $collection->pluck('id'));
        });
    }

}
