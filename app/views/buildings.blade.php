<!-- app/views/buildings.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <title>Building Directory</title>
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
<h1>Building Directory</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<table class="table table-striped table-bordered table-condensed">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Street</th>
    <th>City</th>
    <th>State</th>
    <th>Postal Code</th>
  </tr>

  @foreach($buildings as $building)
  <tr>
    <td width="5%">{{ $building['id'] }}</td>
    <td width="30%">{{ $building['name'] }}</td>
    <td width="30%">{{ $building['street'] }}</td>
    <td width="15%">{{ $building['city'] }}</td>
    <td width="10%">{{ $building['state'] }}</td>
    <td width="10%">{{ $building['postal_code'] }}</td>
  </tr>
  @endforeach

</table>


<p>{{ HTML::linkAction('AdminController@showDashboard', 'Back to Admin Dashboard') }}</p>

{{ Form::close() }}

</body>
</html>