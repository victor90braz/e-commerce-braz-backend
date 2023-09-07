<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, "home"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/logout', [UserController::class, "logout"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/create', [PostController::class, "create"]);
Route::get('/edit-post/{post}', [PostController::class, "editPost"]);
Route::post('/delete', [PostController::class, "delete"]);
