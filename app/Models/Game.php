<?php

namespace App\Models;

use App\Http\Builders\GameBuilder;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Game
 *
 * @property int $id
 * @property string $name
 * @property int $developer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereCreatedAt($value)
 * @method static Builder|Game whereDeletedAt($value)
 * @method static Builder|Game whereDeveloperId($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereName($value)
 * @method static Builder|Game whereUpdatedAt($value)
 * @method Game search(string $name)
 * @method Game searchGenres(Collection $collection)
 * @method Game searchDeveloper(Collection $collection)
 * @mixin Eloquent
 */
class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'developer_id'
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }

    public function newEloquentBuilder($query): GameBuilder
    {
        return new GameBuilder($query);
    }
}
