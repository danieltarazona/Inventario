@extends('layouts.app')

@section('content')

  <h1>Maintenances</h1>

  <a href="{{ route('maintenances.create') }}" class="btn btn-success">Create</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Storer</th>
        <th>State</th>
        <th>Description</th>
        <th>Date</th>
        <th>Products</th>

        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($maintenances as $maintenance)

      <tr>
        <td>{{ $maintenance->id }}</td>
        <td>{{ $maintenance->name }}</td>
        <td>{{ $maintenance->user_id or 'Blank' }}</td>
        <td>{{ $maintenance->state_id or 'Blank' }}</td>
        <td>{{ $maintenance->description or 'Blank' }}</td>
        <td>{{ $maintenance->created_at or 'Blank' }}</td>
        <td>
          @foreach($maintenance->product as $product)
            {{ $product->id }}
          @endforeach
        </td>

        <td>
          <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary">Read</a>
        </td>

        <td>
          <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning">Update</a>
        </td>

        <td>
          {!! Form::open(['route' => ['maintenances.destroy', $maintenance->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach

  </table>

@stop
