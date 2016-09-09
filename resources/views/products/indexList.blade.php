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
        @include('products.list')
      </tr>

    @endforeach

  </table>

@stop
