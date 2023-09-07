<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [TodoController::class, "index"])->name("home");
Route::post("/", [TodoController::class, "create"]);
Route::post("/delete", [TodoController::class, "delete"])->name("delete");
Route::post("/update", [TodoController::class, "update"])->name("update");
