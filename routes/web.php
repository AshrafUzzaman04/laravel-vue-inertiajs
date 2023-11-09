<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [HomeController::class, "login"])->name("login");
    Route::post("/authenticate", [HomeController::class, "authenticate"])->name("authenticate");
});

Route::middleware("auth")->group(
    function () {
        Route::get('/', [HomeController::class, 'home']);
        Route::get('/settings', [HomeController::class, 'settings']);
        Route::get('/users', [HomeController::class, 'users']);
        Route::get('/users/create', [HomeController::class, 'userCreate']);
        Route::post('/users', [HomeController::class, 'userInsert']);
        Route::post("/logout", [HomeController::class, "logout"]);
    }
);
