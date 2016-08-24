@extends('layouts.app')

@section('content')

  <h1>Cities</h1>

  {!! Form::open(['url' => 'cities']) !!}
    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::label('Region') !!}
    {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
  {!! Form::close() !!}

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Region</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($cities as $city)

      <tr>
        <td>{{ $city->id }}</td>
        <td>{{ $city->name or 'Blank' }}</td>
        <td>{{ $city->region_id or 'Blank' }}</td>

        <td>
          {!! Form::open(['route' => ['cities.edit', $city->id], 'method' => 'post']) !!}
            <button class="btn btn-warning" type="submit" >Edit</button>
          {!! Form::close() !!}
        </td>

        <td>
          {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
            <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach

  </table>

@stop
