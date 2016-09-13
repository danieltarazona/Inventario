@extends('layouts.app')

@section('content')

  <h1>Cities</h1>

  <br>

  {!! Form::open(['route' => 'cities.store', 'method' => 'POST']) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Region') !!}
    {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Region</th>
        <th>Stores</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($cities as $city)

      <tr>
        <td>{{ $city->id }}</td>
        <td>{{ $city->name or 'Blank' }}</td>
        <td>{{ $city->region_id or 'Blank' }}</td>
        <td>
          @foreach($city->store as $store)
            {{ $store->id }}
          @endforeach
        </td>

        <td>
          <a href="{{ route('cities.show', $city->id) }}" class="btn btn-primary">Show</a>
        </td>

        <td>
          <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach

  </table>

@stop
