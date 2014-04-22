<!-- app/views/all_requests.blade.php -->

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <title>All Requests</title>
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
<h1>Requests</h1>

{{ $message or '' }}

<!-- if there are login errors, show them here -->
<p>
  {{ HTML::ul($errors->all()) }}
</p>

<table class="table table-striped table-bordered table-condensed">
  <tr>
    <th>Id</th>
    <th>Building</th>
    <th>Title</th>
    <th>Description</th>
    <th>Requested By</th>
    <th>Request Date</th>
    <th>Status</th>
  </tr>

  @foreach($requests as $req)
  <tr>
    <td width="5%">{{ $req['id'] }}</td>
    <td width="5%">{{ $req['building'] }}</td>
    <td width="15%">{{ $req['title']}}</td>
    <td width="40%">{{ $req['desc']}}</td>
    <td width="10%">{{ $req['name'] }}</td>
    <td width="10%">{{ $req['created_at']}}</td>
    <td width="5%">{{ $req['status']}}</td>
    <td width="5%"><a href="{{{ route('edit_request', $req['id']) }}}">edit</a></td>
    <td width="5%"><a href="{{{ route('delete_request', $req['id']) }}}">delete</a></td>
  </tr>
  @endforeach

</table>


<p>{{ HTML::linkAction('AdminController@showDashboard', 'Back to Admin Dashboard') }}</p>

{{ Form::close() }}

</body>
</html>