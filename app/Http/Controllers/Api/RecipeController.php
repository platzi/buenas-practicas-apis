<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\RecipeResource;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category', 'tags', 'user')->get();

        return RecipeResource::collection($recipes);
    }

    public function store() { }

    public function show(Recipe $recipe)
    {
        $recipe = $recipe->load('category', 'tags', 'user');

        return new RecipeResource($recipe);
    }

    public function update() { }

    public function destroy() { }
}