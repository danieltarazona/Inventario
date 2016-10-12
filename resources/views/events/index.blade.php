@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.events') }}</h1>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cart ID</th>
        <th>Start</th>
        <th>End</th>
        <th>Date</th>
      </tr>
    </thead>

    @foreach($events as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->cart_id }}</td>
        <td>{{ $event->start }}</td>
        <td>{{ $event->end }}</td>
        <td>{{ $event->date }}</td>
      </tr>
    @endforeach
  </table>

  @endsection
