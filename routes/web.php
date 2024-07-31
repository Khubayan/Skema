<?php

use App\Http\Controllers\ExController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Handling routes

Route::get('/auth/create', [UserController::class, 'index'])->name('auth.create');
Route::get('/auth/login', [UserController::class, 'loginView'])->name('login');

Route::post('/auth/create', [UserController::class, 'store'])->name('auth.store');
Route::post('/auth/login', [UserController::class, 'authenticate'])->name('auth.user');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(
    function() {
        Route::get('/ex', [ExController::class,'index'])->name('ex.index');
        Route::get('/ex/create', [ExController::class, 'create'])->name('ex.create');
        Route::get('/ex/show/{id}', [ExController::class, 'edit'])->name('ex.edit');
        Route::post('/ex/store', [ExController::class, 'store'])->name('ex.store');
        Route::post('/ex/update/{id}', [ExController::class, 'update'])->name('ex.update');
        Route::delete('/ex/delete/{id}', [ExController::class, 'destroy'])->name('ex.delete');

        Route::post('ex/notify', [ExController::class, 'notify'])->name('ex.notify');
        
    }
);