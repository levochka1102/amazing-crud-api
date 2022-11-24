<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Resouces\GenreCollection;
use App\Http\Resouces\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    public function index()
    {
        return new GenreCollection(Genre::paginate(10));
    }

    public function store(StoreGenreRequest $request)
    {
        Genre::create($request->validated());
        return response()->json("Genre was created");
    }

    public function update(StoreGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return response()->json("Genre was updated");
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json("Genre was deleted");
    }
}
