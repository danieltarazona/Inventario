@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Order')}} / {{ $order->id }}</h1>

  <br>

  {!! Form::open(array('route' => array('orders.sale', $order->id), 'method' => 'POST')) !!}

    {{ Form::submit(trans('strings.Sale'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Image')}}</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.Category')}}</th>
        <th>{{trans('strings.Provider')}}</th>
        <th>{{trans('strings.Store')}}</th>
        <th>{{trans('strings.Serial')}}</th>
        <th>{{trans('strings.Quantity')}}</th>
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
