@extends('layouts.admin')

{{-- @section('content')
<div class="col-sm-3">
	<div class="form-style-6" style="margin-top: 20px">
		<h1>Contact Us</h1>
			{!! Form::open(['method'=>'POST', 'action'=>'StudentCrudController@store', 'files'=>true]) !!}
			@csrf

				{!!Form::label('firstName', 'First Name')!!}
				{!!Form::text('firstName', null, array('autofocus'=>'autofocus'))!!}	
		
				{!!Form::submit('Submit')!!}

		{!! Form::close() !!}
	</div>
</div>
@endsection --}}