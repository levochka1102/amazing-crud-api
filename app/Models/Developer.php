<?php

namespace App\Models;

use App\Http\Builders\DeveloperBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Developer
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereUpdatedAt($value)
 * @method Developer search(string $name)
 * @mixin \Eloquent
 */
class Developer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function newEloquentBuilder($query): DeveloperBuilder
    {
        return new DeveloperBuilder($query);
    }
}
