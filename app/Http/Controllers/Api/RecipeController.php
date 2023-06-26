<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        // all, get
        return Recipe::with('category', 'tags', 'user')->get();
    }

    public function show(Recipe $recipe)
    {
        return $recipe->load('category', 'tags', 'user');
    }
}