<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
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

    if (auth()->user()->id !== $post["user_id"]) {
      return redirect("/");
    }

    return view("/edit-post/edit-post", ['post' => $post]);
  }

  public function updatePost(Post $post, Request $request) {

    if (auth()->user()->id !== $post["user_id"]) {
      return redirect("/");
    }

    $checkFields = [
      "title" => "required",
      "body" => "required"
    ];

    $checkFields = $request->validate($checkFields);

    $checkFields["title"] = strip_tags($checkFields["title"]);
    $checkFields["body"] = strip_tags($checkFields["body"]);

    $post->update($checkFields);

    return redirect("/");
  }

  public function deletePost(Post $post, Request $request) {

    if (auth()->user()->id === $post["user_id"]) {
      $post->delete();
    }

    return redirect("/");
  }

}
