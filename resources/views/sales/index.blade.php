@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.sales')}}</h1>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.delivery')}}</th>
        <th>{{trans('strings.return')}}</th>
        <th>{{trans('strings.store_id')}}</th>
        <th>{{trans('strings.storer')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th>{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach($sales as $sale)
      <tr>
        <td>{{ $sale->id or 'Blank' }}</td>
        <td>{{ $sale->out or 'Blank' }}</td>
        <td>{{ $sale->in or 'Blank' }}</td>
        <td>{{ $sale->user_id or 'Blank' }}</td>
        <td>{{ $sale->user->username or 'Blank' }}</td>
        <td><span class="{{ $sale->state->label }}">{{ $sale->state->name or 'Blank' }}</span></td>

        <td>
          <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

      </tr>
    @endforeach

@stop
