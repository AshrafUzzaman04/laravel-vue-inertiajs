<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "home"])->name("app.home");
Route::get("/users", [HomeController::class, "users"])->name("users.index");
Route::get("/user/create", [HomeController::class, "userCreate"])->name("users.create");
Route::post("/user/insert", [HomeController::class, "userInsert"])->name("users.insert");
Route::get("/settings", [HomeController::class, "settings"])->name("app.settings");
Route::post("/logout", [HomeController::class, "logout"])->name("auth.logout");
