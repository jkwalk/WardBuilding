<!-- app/views/register.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">
  <title>Member Registration</title>
</head>

<body>

{{ Form::open(array('url' => 'register')) }}
<h1>Member Registration</h1>

<!-- if there are errors, show them here -->
@if ($errors)
<p>
  {{ HTML::ul($errors->all()) }}
</p>
@endif

<p>
  {{ Form::label('first_name', 'First Name') }}
  {{ Form::text('first_name') }}
</p>

<p>
  {{ Form::label('last_name', 'Last Name') }}
  {{ Form::text('last_name') }}
</p>

<p>
  {{ Form::label('email', 'Email Address') }}
  {{ Form::text('email') }}
</p>

<p>
  {{ Form::label('password', 'Password') }}
  {{ Form::password('password') }}
</p>

<p>
  {{ Form::label('Ward', 'Ward') }}
  {{ Form::select('ward', array(
    '1' => 'Pleasant View 1st',
    '2' => 'Pleasant View 2nd',
    '3' => 'Pleasant View 3rd',
    '5' => 'Pleasant View 5th',
    '6' => 'Pleasant View 6th',
    '8' => 'Pleasant View 8th',
    '9' => 'Pleasant View 9th',
    '10' => 'Pleasant View 10th (Korean Ward)',
  )); }}
</p>


<p>{{ Form::submit('Register') }}</p>
{{ Form::close() }}

</body>
</html>