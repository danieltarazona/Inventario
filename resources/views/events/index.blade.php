@extends('layouts.app')

@section('content')

  <h1>Events</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Start</th>
        <th>End</th>
        <th>Date</th>
        <th>Product_ID</th>
        <th>Order ID</th>
        <th>User ID</th>
      </tr>
    </thead>
    @foreach($events as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->product->name }}</td>
        <td>{{ $event->start }}</td>
        <td>{{ $event->end }}</td>
        <td>{{ $event->date }}</td>
        <td>{{ $event->product_id }}</td>
        <td>{{ $event->order_id }}</td>
        <td>{{ $event->user_id }}</td>
      </tr>
    @endforeach


  @endsection
