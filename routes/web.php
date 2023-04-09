<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotMachineController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.list');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/edit/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/credit/{id}', [UserController::class, 'show'])->name('users.credit');
    Route::post('/credit/{id}', [UserController::class, 'addCredit'])->name('users.add.credit');
});

Route::prefix('games')->middleware('auth')->group(function () {
    Route::get('/control/{id}', [UserController::class, 'gameControl'])->name('games.control');
    Route::post('/control/{id}', [UserController::class, 'storeControl'])->name('games.control.store');

    Route::get('/slots', [SlotMachineController::class, 'index'])->name('games.slot');
});

require __DIR__.'/auth.php';
