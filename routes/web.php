<?php

use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\ProprietaireController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|Route::get('/', function () {
    return view('welcome');
});
*/
// Route::resource("/proprietaires", ProprietaireController::class);
// Route::get('/batiments/filtrer', [BatimentController::class, 'filtrer'])->name('batiments.filtrer');
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(
    function () {
Route:: resource('batiments', BatimentsController::class);
        Route::controller(ProprietaireController::class)->group(
            function () {

                Route::get('/proprietaires', 'index');
                Route::get('/proprietaires/create', 'create');
                Route::get('/proprietaires/{id}', 'show');
                Route::get('/proprietaires/{id}/edit', 'edit');

                Route::post('/proprietaires/create', 'store');
                Route::put('/proprietaires/{id}', 'update');
                Route::delete('/proprietaires/{id}', 'destroy');
            }
        );

    }
);
Auth::routes();
