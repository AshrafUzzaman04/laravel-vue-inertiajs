<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "home"]);
Route::get("/users", [HomeController::class, "users"]);
Route::get("/settings", [HomeController::class, "settings"]);
Route::post("/logout", [HomeController::class, "logout"]);
