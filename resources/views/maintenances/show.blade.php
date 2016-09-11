@extends('layouts.app')

@section('content')

  <h1>Maintenance {{ $maintenance->id }}</h1>

  <h3>State: {{ $maintenance->state->name }}</h3>
  <h3>Create: {{ $maintenance->created_at }}</h3>
  <h3>Name: {{ $maintenance->name }}</h3>
  <h3>Storer: {{ $maintenance->user->username or 'Blank' }}</h3>
  <h3>Description: </h3>
  <h4>{{ $maintenance->description }}</h4>
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
      <th>Serial</th>
      <th>Warranty</th>
      <th>Quantity</th>
    </tr>
  </thead>

  @foreach($maintenance->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
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
        @foreach($product->state as $state)

          @if($state->name == 'On-Maintenance')
            <td><span class="label label-warning">{{ $state->name }} : {{ $state->pivot->quantity }}</span></td>
          @endif

        @endforeach
      </td>
    </tr>
  @endforeach
</table>


@stop
