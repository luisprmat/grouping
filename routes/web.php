<?php

use App\Http\Controllers\GroupByAggregateFunctionsController;
use App\Http\Controllers\GroupByController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => to_route('dashboard'));

Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('group-by', GroupByController::class)->name('group-by');
Route::get('group-by-aggregate-functions', GroupByAggregateFunctionsController::class)->name('group-by-aggregate-functions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
