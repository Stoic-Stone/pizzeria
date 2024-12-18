<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get("/", [HomeController::class, "index"]);
Route::get("/redirects", [HomeController::class, "redirects"]);
Route::get("/users", [AdminController::class, "users"]);
Route::get("/deletemenu/{id}", [AdminController::class, "deletemenu"]);
Route::get("/foodmenu", [AdminController::class, "foodmenu"]);
Route::post("/uploadfood", [AdminController::class, "upload"]);
Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser"]);
Route::put('/update-role/{id}', [AdminController::class, 'updateRole'])->name('updateRole');
