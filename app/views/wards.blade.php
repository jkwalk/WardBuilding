<!-- app/views/wards.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <title>Ward Directory</title>
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

{{ Form::open(array('url' => 'wards')) }}
<h1>Ward Directory</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<table class="table table-striped table-bordered table-condensed">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Stake</th>
    <th>Street</th>
    <th>City</th>
    <th>State</th>
    <th>Postal Code</th>
  </tr>

  @foreach($wards as $ward)
  <tr>
    <td width="5%">{{ $ward['id'] }}</td>
    <td width="20%">{{ $ward['name'] }}</td>
    <td width="20%">{{ $ward['stake']}}</td>
    <td width="30%">{{ $ward['street'] }}</td>
    <td width="15%">{{ $ward['city'] }}</td>
    <td width="5%">{{ $ward['state'] }}</td>
    <td width="5%">{{ $ward['postal_code'] }}</td>
  </tr>
  @endforeach

</table>


<p>{{ HTML::linkAction('AdminController@showDashboard', 'Back to Admin Dashboard') }}</p>

{{ Form::close() }}

</body>
</html>