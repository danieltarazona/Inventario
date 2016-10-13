@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.events') }}</h1>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>{{ trans('strings.id') }}</th>
        <th>{{ trans('strings.id_product') }}</th>
        <th>{{ trans('strings.serial') }}</th>
        <th>{{ trans('strings.start') }}</th>
        <th>{{ trans('strings.end') }}</th>
        <th>{{ trans('strings.date') }}</th>
      </tr>
    </thead>

    @foreach($events as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->product_id }}</td>
        <td>{{ $event->product->serial }}</td>
        <td>{{ $event->start }}</td>
        <td>{{ $event->end }}</td>
        <td>{{ $event->date }}</td>
      </tr>
    @endforeach
  </table>

  @endsection
