<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/', "welcome");
Route::view("/dashboard", "dashboard") -> name("dashboard") -> middleware("auth");

Route::middleware("guest") -> group(function() {
    Route::get("/register", [RegistrationController::class, "create"]) -> name("register");
    Route::post("/register", [RegistrationController::class, "store"]) -> name("register.store");
    Route::get("/login", [SessionController::class, "create"]) -> name("login");
    Route::post("/login", [SessionController::class, "store"]) -> name("login.store");
});

Route::middleware("auth") -> group(function() {
    Route::resource("tasks", TaskController::class);
    Route::resource("projects.projectTasks", ProjectTaskController::class);
    Route::resource("projects", ProjectController::class);
    Route::delete("/logout", [SessionController::class, "destroy"]) -> name("session.destroy");
});