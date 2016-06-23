@extends('layouts.app')

@section('content')

<style media="screen">
  th, td {
    padding: 10px;
  }
</style>

<h1>Users</h1>

<table>

@foreach ($users as $user)

    <tr>
      <td>Username: {{ $user->username }}</td>
      <td>DNI: {{ $user->dni }}</td>
      <td>Email: {{ $user->email }}</td>

      <td>
        <a href="users/{{ $user->id }}">PROFILE</a>
      </td>

      <td>
        <a href="users/{{ $user->id }}/edit">EDIT</a>
      </td>

      <td>
        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
          <button class="btn btn-danger" type="submit" >DELETE</button>
        {!! Form::close() !!}
      </td>
    </tr>

@endforeach
</table>

@stop
