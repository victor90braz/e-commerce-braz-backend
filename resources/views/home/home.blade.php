<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Braz</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0 auto;
      }

      body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen",
          "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue",
          sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
      .container-register{
        border: 2px solid black;
        margin-bottom: 10px
      }

      .container-login{
        border: 2px solid red
      }

      .container-post{
        background-color: gray;
        padding:10px;
        margin:10px
      }

      h2, button{
        text-transform: uppercase
      }
    </style>
</head>
<body>
  @auth
    <div class="container-logout">
      <p>Congrats you are logged in.</p>
      <form action="./logout" method="POST">
      @csrf
      <button>Log Out</button>
      </form>
    </div>

    <div class="container-create">
      <h2>create</h2>
      <form action="/create"  method="POST">
        @csrf
        <input type="text" name="title" placeholder="post title">
        <textarea name="body" placeholder="body content..."></textarea>
        <button>save post</button>
      </form>
    </div>

    <div class="container-all-posts">
      <h2>all posts</h2>
      @foreach ($posts as $post)
          <div class="container-post">
            <h3>{{$post['title']}}</h3>
            {{$post['body']}}
          </div>

          <div class="container-edit-post">
            <a href="/edit-post/{{$post->id}}">edit</a>
          </div>

          <div class="container-delet-post">
            <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method("DELETE")
            <button>delete</button>
            </form>
          </div>
      @endforeach
    </div>

  @else

    <div class="container-register">
      <h2>register</h2>
      <form action="/register"  method="POST">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button>Register</button>
      </form>
    </div>

    <div class="container-login">
      <h2>login</h2>
      <form action="/login"  method="POST">
        @csrf
        <input type="text" name="loginname" placeholder="name">
        <input type="password" name="loginpassword" placeholder="password">
        <button>login</button>
      </form>
    </div>

  @endauth
</body>
</html>
