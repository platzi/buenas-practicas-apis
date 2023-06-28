<?php 

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\RecipeController;
use App\Http\Controllers\Api\V1\TagController;

Route::prefix('v1')->group(function () {
    Route::get('categories',            [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);

    Route::apiResource('recipes', RecipeController::class);

    Route::get('tags',                  [TagController::class, 'index']);
    Route::get('tags/{tag}',            [TagController::class, 'show']);
});