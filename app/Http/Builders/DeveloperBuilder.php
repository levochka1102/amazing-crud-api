<?php

namespace App\Http\Builders;

use Illuminate\Database\Eloquent\Builder;

class DeveloperBuilder extends Builder
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
