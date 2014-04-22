<!-- app/views/login.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">
  <title>Look at me Login</title>
</head>

<body>

{{ Form::open(array('url' => 'login')) }}
<h1>Member Login</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<p>
  {{ Form::label('email', 'Email Address') }}
  {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@somewhere.com')) }}
</p>

<p>
  {{ Form::label('password', 'Password') }}
  {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}

</body>
</html>