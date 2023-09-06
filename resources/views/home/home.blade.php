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
      .container{
        border: 2px solid black
      }

      h2{
        text-transform: uppercase
      }
    </style>
</head>
<body>
  @auth
    <p>Congrats you are login in.</p>
  @else
    <div class="container">
      <h2>register</h2>
      <form action="/register"  method="POST">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button>Register</button>
      </form>
    </div>
  @endauth
</body>
</html>
