<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;

use App\Http\Controllers\Api\LoginController;

Route::get('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('categories',            [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);

    Route::apiResource('recipes', RecipeController::class);

    Route::get('tags',                  [TagController::class, 'index']);
    Route::get('tags/{tag}',            [TagController::class, 'show']);
});