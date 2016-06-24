@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
<a href="{{ url('register') }}" class="btn btn-success">Create</a>

<table class="table">
  <thead>
   <tr>
       <th>ID</th>
       <th>Username</th>
       <th>DNI</th>
       <th>Email</th>
       <th colspan="3">Actions</th>
   </tr>
   </thead>

@foreach ($users as $user)

  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->dni }}</td>
    <td>{{ $user->email }}</td>

    <td>
      <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Read</a>
    </td>

    <td>
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Update</a>
    </td>

    <td>
      {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
        <button class="btn btn-danger" type="submit" >Delete</button>
      {!! Form::close() !!}
    </td>
  </tr>

@endforeach
</table>

@stop
