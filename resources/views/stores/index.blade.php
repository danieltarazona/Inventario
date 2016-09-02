@extends('layouts.app')

@section('content')

  <h1>Stores</h1>
  @if (Auth::id() == 1)
    <a href="{{ route('stores.create') }}" class="btn btn-success">Create</a>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Region</th>
        <th>City</th>
        <th>Telephone</th>
        <th>Adress</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($stores as $store)

      <tr>
        <td>{{ $store->id }}</td>
        <td>{{ $store->name }}</td>
        <td>{{ $store->region->name or 'Blank' }}</td>
        <td>{{ $store->city->name or 'Blank' }}</td>
        <td>{{ $store->telephone or 'Blank' }}</td>
        <td>{{ $store->adress or 'Blank' }}</td>

        <td>
          <a href="{{ route('stores.show', $store->id) }}" class="btn btn-primary">Read</a>
        </td>

        @if (Auth::id() == 1)
        <td>
          <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['stores.destroy', $store->id], 'method' => 'delete']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop
