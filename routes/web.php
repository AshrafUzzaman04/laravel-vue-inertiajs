<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [HomeController::class, "login"])->name("login");

Route::middleware("auth")->group(
    function () {
        Route::get('/', [HomeController::class, 'home']);
        Route::get('/settings', [HomeController::class, 'settings']);
        Route::get('/users', [HomeController::class, 'users']);
        Route::get('/users/create', [HomeController::class, 'userCreate']);
        Route::post('/users', [HomeController::class, 'userInsert']);
        Route::get('/logout', [HomeController::class, 'logout']);
    }
);
