<!DOCTYPE html>
 <html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('fronten/css/style.css')}}">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Register</h1>
      <form method="post" action="{{route('add')}}"  >
        @csrf
        <p><input type="text" name="name" value="" placeholder="Full Name"></p>
        <p><input type="date" name="day_of_birth" value="" placeholder="day_of_birth"></p>
        <p><input type="text" name="email" value="" placeholder="email"></p>
        <p><select name="gender" id="">
            <option value="male">male</option>    
            <option value="female">female</option>    
        </select></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p><input type="password" name="passwords" value="" placeholder="Password"></p>

        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="register"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
  </section>

  <section class="about">
    <p class="about-links">
      <a href="https://www.designbombs.com/freebie/login-form" target="_parent">Download This Freebie</a>
    </p>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</html>
