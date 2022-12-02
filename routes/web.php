<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ModuleBuyController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\Buy;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|------------------------------------------------------------------------------------------
| Rutas Web
|------------------------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/

Route::get('', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //* Users
    Route::resource('users', UserController::class)->except(['create','edit','show'])->names('user');
    Route::get('users/restore/{id}',[UserController::class,"restore"])->name('user.restore');

    //* Doctors
    Route::resource('doctors', DoctorController::class)->except(['create','edit'])->names('doctor');
    Route::get('doctor/restore/{id}',[DoctorController::class,"restore"])->name('doctor.restore');

    //* Patients
    Route::resource('patients', PatientController::class)->except(['create','edit','show'])->names('patient');
    Route::get('patients/restore/{id}',[PatientController::class,"restore"])->name('patient.restore');

    //* Medicaments
    Route::resource('medicaments', MedicamentController::class)->except(['create','edit','show'])->names('medicament');

    //* Services
    Route::resource('services', ServiceController::class)->except(['create','edit','show'])->names('service');

    //* Units
    Route::resource('units', UnitController::class)->except(['create','edit','show'])->names('unit');

    //* Modules
    Route::resource('modules', ModuleController::class)->except(['create','edit'])->names('module');
    Route::group(['prefix'=>'modules', 'as'=>'module.'], function()
    {
        Route::get('restore/{id}',[ModuleController::class,"restore"])->name('restore');

        Route::get('{module}/transfers', [TransferController::class, 'index'])->name('transfer.index');
        Route::get('{module}/recipes', [RecipeController::class, 'index'])->name('recipe.index');
        Route::get('{module}/buys', [BuyController::class,'index'])->name('buy.index');
    });

    //* Recipes
    Route::resource('recipes', RecipeController::class)->except(['create','edit','show'])->names('recipe');
    Route::group(['prefix'=>'recipes', 'as'=>'recipe.'], function()
    {
        Route::get('create/{module?}', [RecipeController::class, 'create'])->name('create');
        Route::get('restore/{id}',[RecipeController::class,"restore"])->name('restore');
    });

    //* Buys
    Route::resource('buys', BuyController::class)->only(['index','store'])->names('buy');
    Route::group(['prefix'=>'buys', 'as'=>'buy.'], function()
    {
        Route::get('create/{module?}', [BuyController::class, 'create'])->name('create');
       /*  Route::get('restore/{id}',[RecipeController::class,"restore"])->name('restore'); */
    });

});

require __DIR__.'/medinv/TransfersRoute.php';
require __DIR__ . '/auth.php';
