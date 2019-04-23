@extends('layouts.admin2')

@section('content')

@if ($dailyLogs)
		
	

	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
{{--       <th scope="col">Photo</th> --}}
{{-- 	  <th scope="col">Photo</th> --}}
      <th scope="col">Photo</th>
      <th scope="col">ID#</th>
      <th scope="col">Name</th>
      <th scope="col">LoginDate</th>
      <th scope="col">LoginTime</th>
      <th scope="col">LogoutDate</th>
      <th scope="col">LogOutTime</th>
{{--       <th scope="col">Last Name</th>
      <th scope="col">Guardian</th>
      <th scope="col">Guardian Contact#</th> --}}

    </tr>
  </thead>

	@foreach ($dailyLogs as $logs)
	  <tbody>
	    <tr>
	      <td>
	      	<img height="50" src="{{$logs->photo ? $logs->photo->image_name : 
			'http://placehold.it/400x400'}}">
	      </td>
	      <td>{{ $logs->student_id }}</td>
	      <td>{{ $logs->student->lastName . ',' .$logs->student->firstName }}</td>
	      <td>{{ $logs->login_date }}</td>
	      <td>{{ $logs->login_time }}</td>
	      <td>{{ $logs->logout_date ? $logs->logout_date : 'No data available' }}</td>
	      <td>{{ $logs->logout_time ? $logs->logout_time : 'No data available' }}</td>

	    </tr>


 	@endforeach


</table>

@endif


@endsection

