<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use GuzzleHttp\Middleware;
use PHPUnit\Framework\Attributes\Group;

Route::middleware('auth')->group(function(){
    Route::get('/', [MainController::class, 'main'])->name('main');

    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

    Route::resource('applications', ApplicationController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
