<?php

use App\Http\Controllers\CoffeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "welcome";
});

Route::apiResources([
    'recipes' => 'App\Http\Controllers\RecipesController',
    'coffee' => CoffeController::class,
]);

// Route::prefix('coffee')->group(function () {
//     Route::post('/', [CoffeController::class, 'store']);
// });




