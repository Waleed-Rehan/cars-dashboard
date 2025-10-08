<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\EnsureCarUserIsAuthenticated;






Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);


Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware([EnsureCarUserIsAuthenticated::class])->group(function ()
 {

    Route::get('/dashboard', [CarController::class, 'dashboard']);
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    Route::get('/cars/create', [CarController::class, 'create']);
    Route::post('/cars', [CarController::class, 'store']);
    
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');

    Route::put('/cars/{car}', [CarController::class, 'update']);
    
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
    ;
    Route::get('/cars/search', [CarController::class, 'search']);

    Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');


});







