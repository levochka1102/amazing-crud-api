<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class);
    }
}
