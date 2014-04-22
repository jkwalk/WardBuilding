<!-- app/views/main.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">
  <title>Main Page</title>
</head>

<body>
{{ Form::open(array('url' => 'main')) }}
<h1>Welcome to the Member Request Site</h1>

<div>
  <!-- if there are login errors, show them here -->
  <p>
    {{ HTML::ul($errors->all()) }}
  </p>

  <p>{{ HTML::linkAction('HomeController@showLogin', 'Login') }}</p>

  <p>{{ HTML::linkAction('HomeController@showRegister', 'Register New Account') }}</p>
</div>


{{ Form::close() }}

</body>
</html>