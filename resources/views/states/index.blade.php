@extends('layouts.app')

@section('content')

  <h1>States</h1>
  @if (Auth::user()->rol_id > 5)

  {!! Form::open(['url' => 'states']) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  @endif

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($states as $state)

      <tr>
        <td>{{ $state->id }}</td>
        <td>{{ $state->name }}</td>

        @if (Auth::user()->rol_id > 5)
        <td>
          <a href="{{ route('states.edit', $state->id) }}" class="btn btn-warning">Update</a>
        </td>
        @endif

        @if (Auth::user()->rol_id > 5)
        <td>
          {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop