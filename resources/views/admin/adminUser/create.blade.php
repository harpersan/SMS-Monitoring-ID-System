@extends('layouts.admin2')

@section('content')


<div class="row">
	{!! Form::open(['method'=>'POST', 'action'=>'UserCrudController@store', 'files'=>true]) !!}
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
			{!!Form::label('first_name', 'First Name')!!}
			{!!Form::text('first_name', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('last_name', 'Last Name')!!}
			{!!Form::text('last_name', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('email', 'Email Address')!!}
			{!!Form::text('email', null, ['class'=>'form-control'])!!}			
		</div>


		<div class="form-group">
			{!!Form::label('status_id', 'Status')!!}
			{!!Form::select('status_id',[''=>'Choose Option'] + $status, null, ['class'=>'form-control'])!!}		
		</div>

		<div class="form-group">
			{!!Form::label('role_id', 'Authority')!!}
			{!!Form::select('role_id',[''=>'Choose Option'] + $role, null, ['class'=>'form-control'])!!}		
		</div>

		<div class="form-group">
			{!!Form::label('password', 'Password')!!}
			{!!Form::text('password', null, ['class'=>'form-control'])!!}			
		</div>		


		<div class="form-group">
			{!!Form::submit('create User', ['class'=>'btn btn-primary'])!!}	
		
		</div>
		{!! Form::close() !!}
	</div>


</div>	

	@include('includes.showErrors')


@endsection

	


