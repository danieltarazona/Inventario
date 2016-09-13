@extends('layouts.app')

@section('content')

  <h1>Your Cart</h1>

  {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger" type="submit">Clean</button>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Order</a>
  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th>{{trans('strings.Product')}}</th>
        <th>{{trans('strings.Quantity')}}</th>
        <th>{{trans('strings.Actions')}}</th>
      </tr>
    </thead>

<<<<<<< HEAD
    <tr>
      {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
      <button class="btn btn-danger" type="submit" >{{trans('strings.Delete')}}</button>
      {!! Form::close() !!}

      <a href="{{ route('orders.create') }}" class="btn btn-success">{{trans('strings.Order')}}</a>
    </tr>

=======
>>>>>>> master
    @foreach($cart->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="{{ $product->name }}" style="weight:100px; height:100px;"/></a></td>
        <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></td>
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
      </tr>
    @endforeach

  </table>

@endsection
