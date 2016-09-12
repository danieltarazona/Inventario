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
        <th>Store</th>
        <th>Stock</th>
        <th>Serial</th>
        <th>Model</th>
        <th>Buy</th>
        <th>Price</th>
        <th>Warranty</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->stock or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->year or 'Blank' }}</td>
        <td>{{ $product->created_at->year or 'Blank' }}</td>
        <td>{{ $product->price or 'Blank' }}</td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>
        <td>
          <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
