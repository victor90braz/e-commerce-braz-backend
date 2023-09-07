<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function create(Request $request) {

    $checkFields = $request->validate([
      "title"=> ["required"],
      "body"=> ["required", "min:3", "max:200"],
    ]);

    $checkFields["title"] = strip_tags($checkFields["title"]);
    $checkFields["body"] = strip_tags($checkFields["body"]);
    $checkFields["user_id"] = auth()->id();

    Post::create($checkFields);

    return redirect("/");
  }

  public function editPost(Post $post) {
    return view("/edit-post", ['post' => $post]);
  }
}
