<!-- app/views/admin_dashboard.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/pic.css')}}">

  <title>Admin Dashboard</title>
</head>

<body>

{{ Form::open(array('url' => 'main')) }}
<h1>Admin Dashboard</h1>

<div>
  {{ $message or '' }}

  <!-- if there are login errors, show them here -->
  <p>
    {{ HTML::ul($errors->all()) }}
  </p>

  <p>{{ HTML::linkAction('AdminController@showPendingRequests', 'Show Pending Requests') }}</p>

  <p>{{ HTML::linkAction('AdminController@showAllRequests', 'Show All Requests') }}</p>

  <p>{{ HTML::linkAction('AdminController@showMembers', 'Member Directory') }}</p>

  <p>{{ HTML::linkAction('AdminController@showWards', 'Ward Directory') }}</p>

  <p>{{ HTML::linkAction('AdminController@showBuildings', 'Building Directory') }}</p>



  <!-- LOGOUT BUTTON -->
  <a href="{{ URL::to('logout') }}">Logout</a>
</div>


{{ Form::close() }}

</body>
</html>