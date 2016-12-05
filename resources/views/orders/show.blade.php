@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.orders')}} No. {{ $order->id }}</h1>

  <br>

  @if (Auth::user()->role_id > 2)
    {!! Form::open(array('route' => array('orders.sale', $order->id), 'method' => 'POST')) !!}

      {{ Form::submit(trans('strings.sale'), array('class' => 'btn btn-primary')) }}

    {!! Form::close() !!}
  @endif

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.image')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.category')}}</th>
        <th>{{trans('strings.provider')}}</th>
        <th>{{trans('strings.store')}}</th>
        <th>{{trans('strings.serial')}}</th>
      </tr>
    </thead>

  @foreach($order->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
      <td>{{ $product->category->name or 'Blank' }}</td>
      <td>{{ $product->provider->username or 'Blank' }}</td>
      <td>{{ $product->store->name or 'Blank' }}</td>
      <td>{{ $product->serial or 'Blank' }}</td>
    </tr>
  @endforeach

  </table>

@stop
