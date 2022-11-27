<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreIndexRequest;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Resouces\GenreCollection;
use App\Http\Resouces\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    public function all(Request $request)
    {
        return new GenreCollection(Genre::query()
            ->when((bool)$request->search, fn($query) => $query->search($request->search))
            ->get()
        );
    }

    public function index(GenreIndexRequest $request)
    {
        $validated = $request->validated();
        return new GenreCollection(Genre::query()
            ->when($validated['search'], fn($query) => $query->search($validated['search']))
            ->paginate($validated['limit'])
        );
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
