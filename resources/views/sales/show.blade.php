@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.sale')}} No. {{ $sale->id }}</h1>

  {!! Form::open(['route' => ['sales.complete', $sale->id], 'method' => 'POST']) !!}
    <button class="btn btn-primary" type="submit">{{trans('strings.complete')}}</button>
  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.serial')}}</th>
        <th>{{trans('strings.state')}}</th>
      </tr>
    </thead>

    @foreach($sale->order->product as $product)
      <tr>
        <td>{{ $product->id or 'Blank' }}</td>
        <td>{{ $product->name or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td><span class="{{ $product->state->label }}">{{ $product->state->name or 'Blank' }}</span></td>
      </tr>
    @endforeach

    </table>



@stop
