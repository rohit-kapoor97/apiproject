<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bankController;

Route::get('/', function () {
    return view('password');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/detail', [bankController::class, 'bankview']);
Route::post('/store', [bankController::class, 'bankDetail'])->name('data.store');
Route::get('/data', [bankController::class, 'bankdata'])->name('bank.data');

// excel route
Route::get('/export', [bankController::class, 'export'])->name('export.file');
Route::post('/import', [bankController::class, 'import'])->name('file.import');

require __DIR__.'/auth.php';
