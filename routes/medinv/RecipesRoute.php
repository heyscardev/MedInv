<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('recipes/', [TransferController::class, 'index'])->name('recipe.index');
    Route::get('recipes/create/{module?}', [TransferController::class, 'create'])->name('recipe.create');
    Route::post('recipe', [TransferController::class, 'store'])->name('recipe.store');

});
