<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form Design One | Fazt</title>
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
  </head>
  <body>

    <div class="login-box">
      <img src="{{asset('img/logo.png')}}" class="avatar" alt="Avatar Image">
      <h1>Login Here</h1>
      <form>
        <!-- USERNAME INPUT -->
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password">
        <input type="submit" value="Log In">
        <a href="#">Lost your Password?</a><br>
        <a href="#">Don't have An account?</a>
      </form>
    </div>
  </body>
</html>
