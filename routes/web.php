<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

//Routes related to movies CRUD for logged in user
Route::prefix('/my-movies')->middleware(['auth:sanctum', 'verified'])->name('movies.')->group(function () {
    Route::get('index', [MovieController::class,'index'])->name('index');
    Route::get('create', [MovieController::class,'create'])->name('create');
    Route::post('store', [MovieController::class,'submitCompanies'])->name('store');
    Route::get('edit/{id}', [MovieController::class,'edit'])->name('edit');
    Route::post('update/{id}', [MovieController::class,'update'])->name('update');
    Route::post('destroy/{id}', [MovieController::class,'destroy'])->name('destroy ');
});

//Display a movie
Route::get('show/{id}', [MovieController::class,'show'])->name('movies.show');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
