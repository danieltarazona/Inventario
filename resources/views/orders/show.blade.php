@extends('layouts.app')

@section('content')

  <h1>Order / {{ $order->id }}</h1>

  <br>

  {!! Form::open(array('route' => array('orders.sale', $order->id), 'method' => 'POST')) !!}

    {{ Form::submit('Sale', array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Provider</th>
        <th>Store</th>
        <th>Serial</th>
        <th>Quantity</th>
      </tr>
    </thead>

  @foreach($order->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
      <td>{{ $product->category->name or 'Blank' }}</td>
      <td>{{ $product->provider->name or 'Blank' }}</td>
      <td>{{ $product->store->name or 'Blank' }}</td>
      <td>{{ $product->serial or 'Blank' }}</td>
      <td>{{ $product->pivot->quantity or 'Blank' }}</td>
    </tr>
  @endforeach

  </table>

@stop
