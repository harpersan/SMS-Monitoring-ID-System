@extends('layouts.admin2')

@section('content')

<div class="row">
	{!! Form::model($user,['method'=>'PATCH', 'action'=>['UserCrudController@update',$user->id], 'files'=>true]) !!}
	@csrf

	<div class="col-sm-3">
		<div class="form-group">
          <img src="{{$user->admin ?$user->admin->image_name : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
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
			{!!Form::label('status_id', 'Status')!!}
			{!!Form::select('status_id',[''=>'Choose Option'] + $status, null, ['class'=>'form-control'])!!}		
		</div>


		<div class="form-group">
			{!!Form::label('email', 'Email')!!}
			{!!Form::text('email', null, ['class'=>'form-control'])!!}			
		</div>

		<div class="form-group">
			{!!Form::label('password', 'Password')!!}
			{!!Form::password('password',  ['class'=>'form-control'])!!}			
		</div>		



		<div class="form-group">
			{!!Form::submit('Update', ['class'=>'btn btn-primary col-sm-6'])!!}	
		
		</div>
		{!! Form::close() !!}


		{!! Form::open(['method'=>'DELETE', 'action'=>['UserCrudController@destroy', $user->id]]) !!}
		@csrf

		<div class="form-group">
			{!!Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6'])!!}	
		
		</div>

		{!! Form::close() !!}		
	</div>

</div>	

	@include('includes.showErrors')


@endsection

	


