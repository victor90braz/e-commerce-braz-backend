<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('home/home', ['posts' => $posts]);
    }

    public function register(Request $request) {

      $checkFields = ([
        "name"=> ["required", "min:3", "max:20", Rule::unique("users", "name")],
        "email"=> ["required", "email", Rule::unique("users", "email")],
        "password"=> ["required", "min:3", "max:20"],
      ]);

      $incomingFields = $request->validate($checkFields);
      $incomingFields["password"] = bcrypt($incomingFields["password"]);

      $user = User::create($incomingFields);
      auth()->login($user);

      return redirect("/");
    }

    public function logout() {
      auth()->logout();

      return redirect("/");
    }

    public function login(Request $request) {

      $credentials = [
          "name" => $request->input("loginname"),
          "password" => $request->input("loginpassword"),
      ];

      if (auth()->attempt($credentials)) {
          $request->session()->regenerate();
          return redirect("/");
      }

      return redirect("/");
  }

}
