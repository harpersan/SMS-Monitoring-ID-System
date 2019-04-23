@extends('layouts.admin2')

@section('content')


<div class="row">
	{!! Form::open(['method'=>'POST', 'action'=>'StudentCrudController@store', 'files'=>true]) !!}
	@csrf

	<div class="col-sm-3">
		<div class="form-group">
          <img src="http://placehold.it/400x400" alt="" class="img-responsive img-rounded">
			{!!Form::label('photo_id', 'Upload Photo')!!}
			{!!Form::file('photo_id',  ['class'=>'form-control'])!!}			
		</div>
	</div>

	<div class="col-sm-9">
		<div class="form-group">
			{!!Form::label('student_id', 'ID Number')!!}
			{!!Form::text('student_id', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('firstName', 'First Name')!!}
			{!!Form::text('firstName', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('middleName', 'Middle Name')!!}
			{!!Form::text('middleName', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('lastName', 'Last Name')!!}
			{!!Form::text('lastName', null, ['class'=>'form-control'])!!}			
		</div>


		<div class="form-group">
			{!!Form::label('grade_id', 'Year Level')!!}
			{!!Form::select('grade_id',[''=>'Choose Option'] + $year_level, null, ['class'=>'form-control'])!!}		
		</div>

		<div class="form-group">
			{!!Form::label('section_id', 'Section')!!}
			{!!Form::select('section_id',[''=>'Choose Option'] + $section, null, ['class'=>'form-control'])!!}		
		</div>

		<div class="form-group">
			{!!Form::label('guardian_name', 'Guardian Name')!!}
			{!!Form::text('guardian_name', null, ['class'=>'form-control'])!!}			
		</div>		

		<div class="form-group">
			{!!Form::label('mobile_number', 'Guardian Mobile#')!!}
			{!!Form::text('mobile_number', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('is_active', 'Status')!!}
			{!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}			
		</div>


		<div class="form-group">
			{!!Form::submit('create User', ['class'=>'btn btn-primary'])!!}	
		
		</div>
		{!! Form::close() !!}
	</div>


</div>	

	@include('includes.showErrors')


@endsection

	


