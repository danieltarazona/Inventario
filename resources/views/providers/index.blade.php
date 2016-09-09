@extends('layouts.app')

@section('content')

  <h1>Providers</h1>

  <a href="{{ route('providers.create') }}" class="btn btn-success">Create</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Telephone</th>
        <th>Adress</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($providers as $provider)

      <tr>
        <td>{{ $provider->id }}</td>
        <td>{{ $provider->name }}</td>
        <td>{{ $provider->telephone or 'Blank' }}</td>
        <td>{{ $provider->adress or 'Blank' }}</td>

        @if (Auth::id() == 1)
        <td>
          <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['providers.destroy', $provider->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
        @endif

        <td>
          <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning">Update</a>
        </td>
        <td>
          {!! Form::open(['route' => ['providers.destroy', $provider->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>

      </tr>

    @endforeach

  </table>

@stop
