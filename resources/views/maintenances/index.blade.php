@extends('layouts.app')

@section('content')

  <h1>Maintenances</h1>

  <a href="{{ route('maintenances.create') }}" class="btn btn-success">Create</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        @if(Auth::user()->role_id > 2)
          <th>Storer</th>
        @endif
        <th>State</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($maintenances as $maintenance)

      <tr>
        <td>{{ $maintenance->id }}</td>
        <td>{{ $maintenance->name }}</td>
        @if(Auth::user()->role_id > 2)
          <td>{{ $maintenance->user_id or 'Blank' }}</td>
        @endif
        <td>{{ $maintenance->state_id or 'Blank' }} : {{ $maintenance->state->name or 'Blank' }}</td>
        <td>{{ $maintenance->created_at or 'Blank' }}</td>

        <td>
          <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary">Show</a>
        </td>

        <td>
          <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning">Update</a>
        </td>

        @if(Auth::user()->role_id > 2)
        <td>
          {!! Form::open(['route' => ['maintenances.destroy', $maintenance->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
        @endif
      </tr>

    @endforeach

  </table>

@stop
