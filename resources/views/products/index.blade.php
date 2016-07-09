@extends('layouts.app')

@section('content')

  <h1>Products</h1>

  @if (Auth::user()->rol_id == 3)
    <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Manufacturer</th>
        <th>State</th>
        <th>Store</th>
        <th>Stock</th>
        <th>Serial</th>
        <th>Model</th>
        <th>Buy</th>
        <th>Price</th>
        <th>Maintenance</th>
        <th>Warranty</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($products as $product)

      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->manufacturer->name or 'Blank' }}</td>
        <td>{{ $product->state->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->stock or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->year or 'Blank' }}</td>
        <td>{{ $product->created_at->year or 'Blank' }}</td>
        <td>{{ $product->price or 'Blank' }}</td>
        <td>
          @foreach($product->maintenances as $maintenance)
            {{ $maintenance->id or 'None' }}
          @endforeach
        </td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>

        <td>
          <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Read</a>
        </td>


        @if (Auth::user()->rol_id > 1)
          <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
          </td>

          @if (Auth::user()->rol_id > 2)
            <td>
              {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
              <button class="btn btn-danger" type="submit" >Delete</button>
              {!! Form::close() !!}
            </td>
          @endif

        @endif

      </tr>

    @endforeach

  </table>

@stop
