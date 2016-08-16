@extends('layouts.app')

@section('content')

  <h1>Regions</h1>

  @if (Auth::user()->rol_id > 5)

  {!! Form::open(['url' => 'regions']) !!}

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

    @foreach ($regions as $region)

      <tr>
        <td>{{ $region->id }}</td>
        <td>{{ $region->name }}</td>

        @if (Auth::user()->rol_id > 5)
        <td>
          <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'delete']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop
