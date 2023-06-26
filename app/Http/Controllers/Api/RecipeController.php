<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\RecipeResource;

use Symfony\Component\HttpFoundation\Response;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category', 'tags', 'user')->get();

        return RecipeResource::collection($recipes);
    }

    public function store(Request $request) 
    {
        $recipe = Recipe::create($request->all());

        if ($tags = json_decode($request->tags)) {
            $recipe->tags()->attach($tags);
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED); // HTTP 201
    }

    public function show(Recipe $recipe)
    {
        $recipe = $recipe->load('category', 'tags', 'user');

        return new RecipeResource($recipe);
    }

    public function update(Request $request, Recipe $recipe) 
    {
        $recipe->update($request->all());

        if ($tags = json_decode($request->tags)) {
            $recipe->tags()->sync($tags);
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_OK); // 200 
    }

    public function destroy(Recipe $recipe) 
    {
        $recipe->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); // 204
    }
}