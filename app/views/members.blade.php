<!-- app/views/members.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <title>Member Directory</title>
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

{{ Form::open(array('url' => 'request')) }}
<h1>Member Directory</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<table class="table table-striped table-bordered table-condensed">
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Ward</th>
  </tr>

  @foreach($members as $member)
  <tr>
    <td width="10%">{{ $member['id'] }}</td>
    <td width="20%">{{ $member['first_name'] }}</td>
    <td width="20%">{{ $member['last_name']}}</td>
    <td width="20%">{{ $member['email']}}</td>
    <td width="30%">{{ $member['ward'] }}</td>
  </tr>
  @endforeach

</table>


<p>{{ HTML::linkAction('AdminController@showDashboard', 'Back to Admin Dashboard') }}</p>

{{ Form::close() }}

</body>
</html>