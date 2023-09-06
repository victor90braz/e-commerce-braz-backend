<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function home() {
        return view('home/home');
    }

    public function register(Request $request) {

      $checkFields = [
        "name"=> ["required", "min:3", "max:20"],
        "email"=> ["required", "email"],
        "password"=> ["required", "min:3", "max:20"],
      ];

      $incomingFields = $request->validate($checkFields);

      return  $incomingFields;
    }
}
