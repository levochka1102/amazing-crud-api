<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Resouces\DeveloperCollection;
use App\Http\Resouces\DeveloperResource;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        return new DeveloperCollection(Developer::paginate(10));
    }

    public function store(StoreDeveloperRequest $request)
    {
        Developer::create($request->validated());
        return response()->json("Developer was created");
    }

    public function update(StoreDeveloperRequest $request, Developer $developer)
    {
        $developer->update($request->validated());
        return response()->json("Developer was updated");
    }

    public function show(Developer $developer)
    {
        return new DeveloperResource($developer);
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();
        return response()->json("Developer was deleted");
    }
}
