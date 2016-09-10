@extends('layouts.app')

@section('content')

  <p><a href="{{ url('products') }}">Products</a> / Cart</p>

  <h1>Your Cart</h1>

  <table class="table">
    <thead>
      <tr>
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

      {!! Form::open(['route' => ['orders.create', $cart->id], 'method' => 'POST']) !!}
      <button class="btn btn-success" type="submit" >Order</button>
      {!! Form::close() !!}
    </tr>

    @foreach($cart->product as $product)
      <tr>
        <td>
          <ol>
            <li>
              <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="{{ $product->name }}" style="weight:100px; height:100px;"/></a></td>
              <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></td>
              <!-- <td>{{ $product->state->name or 'Blank' }}</td> -->
              <!-- <td>{{ $product->price or 'Blank' }}</td> -->
              <td><input type="number" name="quantity" value="{{ $product->quantity or '1'}}"></td>
              <td>
                {!! Form::open(['route' => ['cart.update', $product->id, $product->quantity], 'method' => 'PATCH']) !!}
                <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o fa-lg" type="submit"></i></button>
                {!! Form::close() !!}
              </td>
              <td>
                {!! Form::open(['route' => ['cart.remove', $product->id], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
                {!! Form::close() !!}
              </td>
            </li>
          </ol>
        </td>
      </tr>
    @endforeach
  </table>

@endsection
