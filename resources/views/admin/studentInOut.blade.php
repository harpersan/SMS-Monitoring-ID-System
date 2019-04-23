@extends('layouts.admin2')

@section('content')

<div class="row">
	<div class="col-sm-3">
		<div class="form-style-6" style="margin-top: 20px">
			<h1>Tap Your ID Here</h1>
				<form method="POST" action="{{ route('index.store') }}">
				@csrf

				<input type="text" name="student_id" placeholder="ID Number"  autofocus maxlength="10" />
			
					{!!Form::submit('Submit')!!}

				</form>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="container" >	
		
		@if ($student_logs)
			
			@foreach ($student_logs as $current_student)
				<img height="450" width="450" src="{{$current_student->photo ? $current_student->photo->image_name : 
				'http://placehold.it/400x400'}}">

		
		
		</div>
	</div>



	<div class="col-sm-3">
		
		<h2>Name</h2>
		<h3><u>{{$current_student->student->lastName . ',' . $current_student->student->firstName}}</u></h3>
		<h2>Year Level</h2>
		<h3><u>Grade {{$current_student->student->grade_id}}</u></h3>
		<h2>Section</h2>
		<h3><u>Section {{$current_student->student->section_id}}</u></h3>
	</div>	
</div>

			@endforeach
	
		@endif		
@endsection


