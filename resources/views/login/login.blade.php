<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{asset('fronten/css/style.css')}}">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  
  <section class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      @if(isset($kq))
       <h3 style="color: red">{{$kq}}</h3>
      @endif
      <form method="post" action="{{route('loginProcessing')}}">
        @csrf
        <p><input type="text" name="email" value="" placeholder="Username or Email"></p>
        @error('email')
    <div class="alert alert-danger"><p style="color: red">{{ $message }}</p></div>
@enderror
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <p class="remember_me">
        
        </p>
        <p class="submit"><input type="submit" name="commit" value="đăng nhập">
          <a href="{{route('register')}}"name="commit"value="đăng nhập">đăng ký</a>
        </p>
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
</html>
