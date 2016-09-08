@extends('layouts.app')

@section('content')

  <a href="{{ route('categories.index') }}">
    <button type="button" class="btn btn-default">
      <span class="fa fa-th" aria-hidden="true"></span>
    </button>
  </a>

  <a href="{{ route('categories.index') }}">
    <button type="button" class="btn btn-default">
      <span class="fa fa-th-list" aria-hidden="true"></span>
    </button>
  </a>

  <h1>Products</h1>

  <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>

  <td>
    {!! Form::open(['route' => ['products.search'], 'method' => 'GET']) !!}
    <input class="form-control" type="search" name="search" placeholder="Search" value="">
    <button class="btn" type="submit" >Search</button>
    {!! Form::close() !!}
  </td>



  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Provider</th>
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
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->name or 'Blank' }}</td>
        <td>{{ $product->state->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->stock or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->year or 'Blank' }}</td>
        <td>{{ $product->created_at->year or 'Blank' }}</td>
        <td>{{ $product->price or 'Blank' }}</td>
        <td>
          @foreach($product->maintenance as $maintenance)
            {{ $maintenance->id or 'None' }}
          @endforeach
        </td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>
        <td>
          <a href="{{ route('products.show', $product->id) }}" id="Create" class="btn btn-primary">Show</a>
        </td>
        <td>
          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
        </td>
        <td>
          {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
          <button class="btn btn-danger" type="submit" >Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach

  </table>

@stop
