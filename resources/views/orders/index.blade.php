@extends('layouts.app')

@section('content')

  <h1>Orders</h1>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Start</th>
        <th>End</th>
        <th>User ID</th>
        <th>User</th>
        <th>State ID</th>
        <th>State</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach($orders as $order)
      <tr>
        <td>{{ $order->id or 'Blank' }}</td>
        <td>{{ $order->date or 'Blank' }}</td>
        <td>{{ $order->start or 'Blank' }}</td>
        <td>{{ $order->end or 'Blank' }}</td>
        <td>{{ $order->user_id or 'Blank' }}</td>
        <td>{{ $order->user->username or 'Blank' }}</td>
        <td>{{ $order->state_id or 'Blank' }}</td>

        @if($order->state->name == 'Waiting')
          <td><span class="label label-warning">{{ $order->state->name or 'Blank' }}</span></td>
        @endif

        @if($order->state->name == 'Complete')
          <td><span class="label label-success">{{ $order->state->name or 'Blank' }}</span></td>
        @endif

        @if($order->state->name == 'Product or Products Not Found')
          <td><span class="label label-danger">{{ $order->state->name or 'Blank'  }}</span></td>
        @endif

        @if($order->state->name == 'Returned')
          <td><span class="label label-success">{{ $order->state->name or 'Blank'  }}</span></td>
        @endif

        @if($order->state->name == 'Cancelled')
          <td><span class="label label-default">{{ $order->state->name or 'Blank'  }}</span></td>
        @endif

        <td>
          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

      </tr>
    @endforeach
@stop
