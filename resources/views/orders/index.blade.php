@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Orders')}}</h1>

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
        <td>{{ $order->state->name or 'Blank' }}</td>

        <td>
          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        @if(Auth::user()->role_id > 2)
        <td>
          {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          {!! Form::close() !!}
        </td>
        @endif
      </tr>
    @endforeach
@stop
