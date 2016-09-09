@extends('layouts.app')

@section('content')

  <h1>Maintenance {{ $maintenance->id }}</h1>

  <h3>State: {{ $maintenance->state->name }}</h3>
  <h3>Create: {{ $maintenance->created_at }}</h3>
  <h3>Name: {{ $maintenance->name }}</h3>
  <h3>Storer: {{ $maintenance->user->username or 'Blank' }}</h3>
  <h3>Description: {{ $maintenance->description }}</h3>
</h3>

<br>
<h1>Products in Maintenance</h1>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th></th>
      <th>Product</th>
      <th>Category</th>
      <th>Provider</th>
      <th>Store</th>
      <th>Quantity</th>
      <th>Serial</th>
      <th>Warrany</th>
    </tr>
  </thead>

  @foreach($maintenance->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category->name or 'Blank' }}</td>
      <td>{{ $product->provider->name or 'Blank' }}</td>
      <td>{{ $product->store->name or 'Blank' }}</td>
      <td>{{ $product->quantity or 'Blank' }}</td>
      <td>{{ $product->serial or 'Blank' }}</td>
      <td>{{ $product->warranty or 'Blank' }} Months</td>
    </tr>
  @endforeach

</table>


@stop
