<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/servers', [ServerController::class, 'index'])->name('server');
    Route::get('/server/create', [ServerController::class, 'create'])->name('server.create');;
    Route::post('/servers', [ServerController::class, 'store']);
    Route::get('/server/update/{server}', [ServerController::class, 'update'])->name('server.update');;
    Route::patch('/server/update-server/{server}', [ServerController::class, 'update_server'])->name('update.server');
    Route::delete('/server/delete/{server}', [ServerController::class, 'delete'])->name('delete.server');
});

require __DIR__.'/auth.php';