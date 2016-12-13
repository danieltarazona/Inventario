@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.orders')}}</h1>

  {!! Form::open(['route' => ['orders.search'], 'method' => 'POST']) !!}

  <br>
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <input type="text" class="form-control" name="search" placeholder="Search" style="width:50%">
          <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
    </div>
  <br>

  {!! Form::close() !!}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.date_create')}}</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.hour_start')}}</th>
        <th>{{trans('strings.hour_end')}}</th>
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
        <td>{{ $order->date or 'Blank' }}</td>
        <td>{{ $order->start or 'Blank' }}</td>
        <td>{{ $order->end or 'Blank' }}</td>
        <td>{{ $order->user->dni or 'Blank' }}</td>
        <td>{{ $order->user->username or 'Blank' }}</td>
        <td><span class="{{ $order->state->label }}">{{ $order->state->name or 'Blank'  }}</span></td>

        <td>
          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary"><i name="Show" class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>

        @if ($order->state_id == 401)
          <td>
            <a href="{{ route('orders.edit', $order->id) }}" name="Edit" class="btn btn-warning"><i name="Edit" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          </td>
        @endif

      </tr>
    @endforeach

  </table>

@stop
