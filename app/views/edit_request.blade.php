<!-- app/views/edit_request.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">
  <title>Request</title>
</head>

<body>

{{ Form::model($request, array('method' => 'put', 'route' => array('admin.update', $request->id))) }}
<h1>Update Request</h1>

{{ $message or '' }}

<!-- if there are errors, show them here -->
@if ($errors)
<p>
  {{ HTML::ul($errors->all()) }}
</p>
@endif

<p>
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title') }}
</p>

<p>
  {{ Form::label('desc', 'Problem Description') }}
  {{ Form::textarea('desc') }}
</p>

<p>
  {{ Form::label('status', 'Status') }}
  {{ Form::text('status') }}
</p>

<p>{{ Form::submit('Update Request') }}</p>

<p>{{ HTML::linkAction('AdminController@showDashboard', 'Back to Admin Dashboard') }}</p>
{{ Form::close() }}

</body>
</html>