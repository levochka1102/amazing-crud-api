<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}
