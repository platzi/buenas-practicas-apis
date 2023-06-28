<?php 

use App\Http\Controllers\Api\V2\RecipeController;

Route::prefix('v2')->group(function () {
    Route::get('recipes', [RecipeController::class, 'index']);
});