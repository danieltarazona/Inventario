@extends('layouts.app')

@section('content')

  <h1>Roles</h1>

  {!! Form::open(['url' => 'roles']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($roles as $role)
      <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Update</a>
        </td>
        <td>
          {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
