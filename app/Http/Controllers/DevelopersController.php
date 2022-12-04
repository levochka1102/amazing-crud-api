<?php

namespace App\Http\Controllers;

use App\Http\Requests\Developers\DevelopersIndexRequest;
use App\Http\Requests\Developers\StoreDevelopersRequest;
use App\Http\Resouces\Developers\DevelopersCollection;
use App\Http\Resouces\Developers\DevelopersResource;
use App\Models\Developer;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function all(Request $request)
    {
        return new DevelopersCollection(Developer::query()
            ->when((bool)$request->search, fn($query) => $query->search($request->search))
            ->get()
        );
    }

    public function index(DevelopersIndexRequest $request)
    {
        $validated = $request->validated();
        return new DevelopersCollection(Developer::query()
            ->when($validated['search'], fn($query) => $query->search($validated['search']))
            ->paginate($validated['limit'])
        );
    }

    public function store(StoreDevelopersRequest $request)
    {
        Developer::create($request->validated());
        return response()->json("Developer was created");
    }

    public function update(StoreDevelopersRequest $request, Developer $developer)
    {
        $developer->update($request->validated());
        return response()->json("Developer was updated");
    }

    public function show(Developer $developer)
    {
        return new DevelopersResource($developer);
    }

    public function destroy(Developer $developer)
    {
        if ($developer->games()->exists()) {
            return response()->json([
                'message' => sprintf('Developer "%s" cannot be deleted because it has %d games', $developer->name, $developer->games()->count())
            ], 422);
        }
        else {
            $developer->delete();
            return response()->json($developer);
        }
    }
}
