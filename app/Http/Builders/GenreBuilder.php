<?php

namespace App\Http\Builders;

use Illuminate\Database\Eloquent\Builder;

class GenreBuilder extends Builder
{
    /**
     * @param string $name
     * @return $this
     */
    public function search(string $name): self
    {
        return $this->where('name', 'like', '%' . $name . '%');
    }
}
