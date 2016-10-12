@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.repairs')}}</h1>

  <br>

  <a href="{{ route('repairs.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.provider')}}</th>
        <th>{{trans('strings.store')}}</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($repairs as $repair)

      <tr>
        <td>{{ $repair->id or 'Blank'  }}</td>
        <td>{{ $repair->name or 'Blank' }}</td>
        <td>{{ $repair->provider->username or 'Blank' }}</td>
        <td>{{ $repair->provider->store->name or 'Blank' }}</td>
        <td>{{ $repair->created_at or 'Blank' }}</td>
        <td><span class="{{ $repair->state->label }}">{{ $repair->state->name or 'Blank' }}</span></td>

        <td>
          <a href="{{ route('repairs.show', $repair->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

      </tr>

    @endforeach

  </table>

@stop
