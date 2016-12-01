@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.orders')}}</h1>

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.hour_start')}}</th>
        <th>{{trans('strings.dni')}}</th>
        <th>{{trans('strings.user')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach($orders as $order)
      <tr>
        <td>{{ $order->id or 'Blank' }}</td>
        <td>{{ $order->created_at or 'Blank' }}</td>
        <td>{{ $order->start or 'Blank' }}</td>
        <td>{{ $order->user->dni or 'Blank' }}</td>
        <td>{{ $order->user->username or 'Blank' }}</td>
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
