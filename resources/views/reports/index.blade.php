@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}}</h1>

  <a href="{{ route('reports.create') }}">
    <button class="btn btn-primary" type="submit" name="{{trans('strings.create')}}">
      {{ trans('strings.create') }}
    </button>
  </a>

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.type')}}</th>
        <th>{{trans('strings.start')}}</th>
        <th>{{trans('strings.end')}}</th>
        <th colspan="3">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

  @foreach ($reports as $report)
    <tr>
      <td>{{ $report->id or 'Blank'  }}</td>
    </tr>
  @endforeach

</table>


@stop
