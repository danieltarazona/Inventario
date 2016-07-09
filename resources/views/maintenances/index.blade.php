@extends('layouts.app')

@section('content')

  <h1>Maintenances</h1>
  <a href="{{ route('maintenances.create') }}" class="btn btn-success">Order</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Seller</th>
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
        <td>{{ $maintenance->seller_id or 'Blank' }}</td>
        <td>{{ $maintenance->description or 'Blank' }}</td>
        <td>{{ $maintenance->created_at or 'Blank' }}</td>
        <td>
          @foreach($maintenance->products as $product)
            {{ $product->id }}
          @endforeach
        </td>

        <td>
          <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary">Read</a>
        </td>

        @if (Auth::user()->rol_id > 1)
          <td>
            <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning">Update</a>
          </td>

          @if (Auth::user()->rol_id > 2)
            <td>
              {!! Form::open(['route' => ['maintenances.destroy', $maintenance->id], 'method' => 'delete']) !!}
              <button class="btn btn-danger" type="submit" >Delete</button>
              {!! Form::close() !!}
            </td>
          @endif
        @endif

      </tr>

    @endforeach

  </table>

@stop
