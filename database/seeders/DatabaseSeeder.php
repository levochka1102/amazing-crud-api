<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            GenreSeeder::class,
//            DeveloperSeeder::class,
//            GameSeeder::class,
//        ]);

        $genresNames = [
            'Ужасы', 'Детектив', 'Шутер', 'Рогалик', 'Приключение', 'Платформер', 'Головоломки', 'Аркады'
        ];

        $genres = Genre::factory()
            ->count(count($genresNames))
            ->sequence(fn ($sequence) => ['name' => $genresNames[$sequence->index]])
            ->create();

        Developer::factory(80)->create()->each(function ($developer) use ($genres) {
            Game::factory(rand(1, 4))->create([
                'developer_id' => $developer->id
            ])->each(function ($game) use ($genres) {
                $game->genres()->attach($genres->random(rand(1, 3)));
            });
        });



    }
}
