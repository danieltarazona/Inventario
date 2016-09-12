@extends('layouts.app')

@section('content')

  <p><a href="{{ url('products') }}">Products</a> / Cart</p>

  <h1>Your Cart</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tr>
      {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
      <button class="btn btn-danger" type="submit" >Delete</button>
      {!! Form::close() !!}

      <a href="{{ route('orders.create') }}" class="btn btn-success">Order</a>
    </tr>

    @foreach($cart->product as $product)
      <tr>
        <td>
          <td>{{ $product->id }}</td>
          <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="{{ $product->name }}" style="weight:100px; height:100px;"/></a></td>
          <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></td>
          <!-- <td>{{ $product->state->name or 'Blank' }}</td> -->
          <!-- <td>{{ $product->pivot->quantity or 'Blank' }}</td> -->
          <td>
            {!! Form::open(['route' => ['cart.update', $cart->id, $product->id], 'method' => 'PATCH']) !!}
            <input type="number" name="quantity" value="{{ $product->pivot->quantity  or '1'}}">
            <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o fa-lg" type="submit"></i></button>
            {!! Form::close() !!}
          </td>
          <td>
            {!! Form::open(['route' => ['cart.remove', $product->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
            {!! Form::close() !!}
          </td>
        </td>
      </tr>
    @endforeach
  </table>

@endsection
