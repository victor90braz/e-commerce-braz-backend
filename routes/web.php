<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
		return view('home/home');
});

Route::post('/register', function () {
  return "thanks to register";
});
