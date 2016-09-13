@extends('layouts.app')

@section('content')

  <h1>States</h1>

  <br>

  {!! Form::open(['url' => 'states']) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($states as $state)
      <tr>
        <td>{{ $state->id }}</td>
        <td>{{ $state->name }}</td>
        <td>
          <a href="{{ route('states.edit', $state->id) }}" class="btn btn-warning">Update</a>
        </td>
        <td>
          {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
