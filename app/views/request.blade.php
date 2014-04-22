<!-- app/views/request.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">
  <title>Make a request</title>
</head>

<body>

{{ Form::open(array('url' => 'request')) }}
<h1>Request</h1>

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<p>
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title') }}
</p>

<p>
  {{ Form::label('desc', 'Problem Description') }}
  {{ Form::textarea('desc') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>

<p>{{ HTML::linkAction('HomeController@showDashboard', 'Back to Dashboard') }}</p>
{{ Form::close() }}

</body>
</html>