@extends('layouts.admin2')

@section('content')

@if ($admin);
        
    

    <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">ID#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>

    </tr>
  </thead>

    @foreach ($admin as $admin_user)
      <tbody>
        <tr>
          <td>
            <a href="{{ route('user.edit', $admin_user->id) }}">
                <img height="50" width="50" src="{{$admin_user->admin ? $admin_user->admin->image_name : 
                    'http://placehold.it/400x400'}}">
            </a>
          </td>
          <td>{{ $admin_user->id }}</td>
          <td>{{ $admin_user->first_name }}</td>
          <td>{{ $admin_user->last_name }}</td>
          <td>{{ $admin_user->email }}</td>
          <td>{{ $admin_user->status->name }}</td>

        </tr>
    @endforeach


</table>

@endif


@endsection

