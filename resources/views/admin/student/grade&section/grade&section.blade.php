@extends('layouts.admin2')

@section('content')

@if ($g_s);
		
	

	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">ID#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Guardian</th>
      <th scope="col">Guardian Contact#</th>

    </tr>
  </thead>

	@foreach ($g_s as $grade_section)
	  <tbody>
	    <tr>
	      <td>
			<a href="{{ route('student.edit', $grade_section->id) }}">
	      		<img height="50" src="{{$grade_section->photo ? $grade_section->photo->image_name : 
	      			'http://placehold.it/400x400'}}">
			</a>
	      </td>
	      <td>{{ $grade_section->student_id }}</td>
	      <td>{{ $grade_section->firstName }}</td>
	      <td>{{ $grade_section->middleName }}</td>
	      <td>{{ $grade_section->lastName }}</td>
	      <td>{{ $grade_section->guardian_name }}</td>
	      <td>{{ $grade_section->mobile_number }}</td>
	    </tr>
 	@endforeach


</table>

@endif


@endsection

