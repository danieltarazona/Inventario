@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Orders')}}</h1>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Date')}}</th>
        <th>{{trans('strings.Start')}}</th>
        <th>{{trans('strings.End')}}</th>
        <th>{{trans('strings.UserID')}}</th>
        <th>{{trans('strings.User')}}</th>
        <th>{{trans('strings.StateID')}}</th>
        <th>{{trans('strings.State')}}</th>
        <th>{{trans('strings.Actions')}}</th>
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
        <td><span class="{{ $order->state->label }}">{{ $order->state->name or 'Blank'  }}</span></td>

        <td>
          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

      </tr>
    @endforeach
@stop
