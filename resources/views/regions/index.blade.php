@extends('layouts.app')

@section('content')

  <h1>Regions</h1>

  {!! Form::open(['url' => 'regions']) !!}

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

    @foreach ($regions as $region)

      <tr>
        <td>{{ $region->id }}</td>
        <td>{{ $region->name }}</td>

        @if (Auth::user()->role_id > 1)
        <td>
          <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop
