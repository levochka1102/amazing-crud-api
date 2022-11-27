<?php

namespace App\Http\Builders;

use Illuminate\Database\Eloquent\Builder;

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
     * @param array $ids
     * @return $this
     */
    public function whereHasGenresIds(array $ids): self
    {
        return $this->whereHas('genres', function (Builder $genres) use ($ids) {
            $genres->whereIn('id', $ids);
        });
    }

    /**
     * @param array $ids
     * @return $this
     */
    public function whereHasDevelopersIds(array $ids): self
    {
        return $this->whereHas('developer', function (Builder $genres) use ($ids) {
            $genres->whereIn('id', $ids);
        });
    }
}
