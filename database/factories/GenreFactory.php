<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->unique()->word),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
