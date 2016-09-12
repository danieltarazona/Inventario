@extends('layouts.app')

@section('content')

  <h1>Orders</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
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
        <td>{{ $order->create_at or 'Blank' }}</td>
        <td>{{ $order->user_id or 'Blank' }}</td>
        <td>{{ $order->user->username or 'Blank' }}</td>
        <td>{{ $order->state_id or 'Blank' }}</td>
        <td>{{ $order->state->name or 'Blank' }}</td>
      </tr>
    @endforeach

@stop
