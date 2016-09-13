@extends('layouts.app')

@section('content')

  <h1>Sale {{ $sale->id }}</h1>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach($sale->order->product as $product)
      <tr>
        <td>{{ $product->id or 'Blank' }}</td>
        <td>{{ $product->name or 'Blank' }}</td>
        <td>{{ $product->pivot->quantity or 'Blank' }}</td>

        <td>
          {!! Form::open(['route' => ['products.returned', $product->id], 'method' => 'POST']) !!}
          <button class="btn btn-primary" type="submit">Returned</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

@stop
