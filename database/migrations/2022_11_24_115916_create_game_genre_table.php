<?php

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_genre', function (Blueprint $table) {
            $table->foreignIdFor(Game::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Genre::class)->constrained()->onDelete('cascade');
            $table->primary(['game_id', 'genre_id']);

            $table->unique(['game_id', 'genre_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_genre');
    }
};
