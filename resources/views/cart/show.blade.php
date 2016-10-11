@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.your') }} {{trans('strings.cart')}}</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th>{{trans('strings.Product')}}</th>
        <th>{{trans('strings.Actions')}}</th>
      </tr>
    </thead>


    <tr>
      {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
      <button class="btn btn-danger" type="submit" >{{trans('strings.clean')}}</button>
      {!! Form::close() !!}

      <a href="{{ route('orders.create') }}" class="btn btn-success">{{trans('strings.Order')}}</a>
    </tr>


    @foreach($cart->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="{{ $product->name }}" style="weight:100px; height:100px;"/></a></td>
        <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></td>
        <td>
          {!! Form::open(['route' => ['cart.remove', $product->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
