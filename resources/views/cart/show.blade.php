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
      {!! Form::open(['route' => ['cart.destroy', Auth::id()], 'method' => 'DELETE']) !!}
      <button class="btn btn-danger" type="submit" >Delete</button>
      {!! Form::close() !!}

      <a href="{{ route('orders.create') }}" class="btn btn-success">Order</a>
    </tr>

    @if($cart->has($product))
      @foreach($cart->product as $product)
        <tr>
          <td>
            <td>{{ $product->id or 'Blank' }}</td>
            <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo or 'Blank' }}" alt="{{ $product->name or 'Blank'  }}" style="weight:100px; height:100px;"/></a></td>
            <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name or 'Blank'  }}</a></td>
            <!-- <td>{{ $product->state->name or 'Blank' }}</td> -->
            <!-- <td>{{ $product->pivot->quantity or 'Blank' }}</td> -->
            <td>
              {!! Form::open(['route' => ['cart.update', $product->id], 'method' => 'PATCH']) !!}
              <input type="number" name="quantity" value="{{ $product->pivot->quantity }}">
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
    @endif



  </table>

@endsection
