<!-- app/views/dashboard.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <title>Dashboard</title>
</head>
<style>
  table, th, td
  {
    border:1px solid black

  }
  table
  {
    border-spacing:5px;
  }
</style>

<body>


{{ Form::open(array('url' => 'main')) }}
<h1>Member Dashboard</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<p>
  <h3>{{ 'Requests' }}</h3>
  <br>
  {{-- */$member = WardBuilding\Models\Member::find(Auth::user()->id)/* --}}

  {{-- */$requests = $member->requests()->get()/* --}}

<table class="table table-striped table-bordered table-condensed">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Request Date</th>
    <th>Status</th>
  </tr>

  @foreach($requests as $req)
    <tr>
      <td width="30%">{{ $req['title']}}</td>
      <td width="50%">{{ $req['desc']}}</td>
      <td width="10%">{{ $req['created_at']}}</td>
      <td width="10%">{{ $req['status']}}</td>
    </tr>
  @endforeach

  </table>


</p>

<p>{{ HTML::linkAction('HomeController@showRequest', 'Make New Request') }}</p>

<!-- LOGOUT BUTTON -->
<a href="{{ URL::to('logout') }}">Logout</a>

{{ Form::close() }}

</body>
</html>