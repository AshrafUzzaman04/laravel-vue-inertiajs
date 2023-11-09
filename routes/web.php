<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
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
        Route::get('/users/create', [HomeController::class, 'userCreate'])->can("create", User::class);
        Route::post('/users/insert', [HomeController::class, 'userInsert']);
        Route::post("/logout", [HomeController::class, "logout"]);
    }
);
