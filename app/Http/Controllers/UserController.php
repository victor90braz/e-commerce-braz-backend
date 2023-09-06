<?php

namespace App\Http\Controllers;

use App\Models\User;
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
      $incomingFields["password"] = bcrypt($incomingFields["password"]);

      User::create($incomingFields);

      return  $incomingFields;
    }
}
