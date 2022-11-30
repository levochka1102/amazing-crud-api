<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genres\GenresIndexRequest;
use App\Http\Requests\Genres\StoreGenresRequest;
use App\Http\Resouces\Genres\GenresCollection;
use App\Http\Resouces\Genres\GenresResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function all(Request $request)
    {
        return new GenresCollection(Genre::query()
            ->when((bool)$request->search, fn($query) => $query->search($request->search))
            ->get()
        );
    }

    public function index(GenresIndexRequest $request)
    {
        $validated = $request->validated();
        return new GenresCollection(Genre::query()
            ->when($validated['search'], fn($query) => $query->search($validated['search']))
            ->paginate($validated['limit'])
        );
    }

    public function store(StoreGenresRequest $request)
    {
        Genre::create($request->validated());
        return response()->json("Genre was created");
    }

    public function update(StoreGenresRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return response()->json("Genre was updated");
    }

    public function show(Genre $genre)
    {
        return new GenresResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json("Genre was deleted");
    }
}
