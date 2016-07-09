@extends('layouts.app')

@section('content')

  <h1>Products</h1>

  @if (Auth::user()->rol_id == 3)
    <a href="{{ route('cities.create') }}" class="btn btn-success">Add</a>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Region</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($cities as $city)

      <tr>
        <td>{{ $city->id }}</td>
        <td>{{ $city->name or 'Blank' }}</td>
        <td>{{ $city->region_id or 'Blank' }}</td>

        <td>
          <a href="{{ route('cities.show', $city->id) }}" class="btn btn-primary">Read</a>
        </td>

        @if (Auth::user()->rol_id > 1)
          <td>
            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning">Update</a>
          </td>

          @if (Auth::user()->rol_id > 2)
            <td>
              {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
              <button class="btn btn-danger" type="submit" >Delete</button>
              {!! Form::close() !!}
            </td>
          @endif

        @endif

      </tr>

    @endforeach

  </table>

@stop
