@extends('layouts.app')

@section('content')

  <h1>Sales</h1>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Start</th>
        <th>End</th>
        <th>Storer ID</th>
        <th>Storer</th>
        <th>State ID</th>
        <th>State</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach($sales as $sale)
      <tr>
        <td>{{ $sale->id or 'Blank' }}</td>
        <td>{{ $sale->out or 'Blank' }}</td>
        <td>{{ $sale->in or 'Blank' }}</td>
        <td>{{ $sale->user_id or 'Blank' }}</td>
        <td>{{ $sale->user->username or 'Blank' }}</td>
        <td>{{ $sale->state_id or 'Blank' }}</td>

        @if($sale->state->name == 'Waiting')
          <td><span class="label label-warning">{{ $sale->state->name or 'Blank' }}</span></td>
        @endif

        @if($sale->state->name == 'Complete')
          <td><span class="label label-success">{{ $sale->state->name or 'Blank' }}</span></td>
        @endif

        @if($sale->state->name == 'Product or Products Not Found')
          <td><span class="label label-danger">{{ $sale->state->name or 'Blank'  }}</span></td>
        @endif

        @if($sale->state->name == 'Returned')
          <td><span class="label label-success">{{ $sale->state->name or 'Blank'  }}</span></td>
        @endif

        @if($sale->state->name == 'Cancelled')
          <td><span class="label label-default">{{ $sale->state->name or 'Blank'  }}</span></td>
        @endif

        <td>
          <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        @if(Auth::user()->role_id > 2)
          <td>
            {!! Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            {!! Form::close() !!}
          </td>
        @endif
      </tr>
    @endforeach

@stop
