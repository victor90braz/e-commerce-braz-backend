<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
		return view('home/home');
});

Route::post('/register', [UserController::class, "register"]);
