@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.maintenances')}}</h1>

  <br>

  <a href="{{ route('maintenances.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.provider')}}</th>
        <th>{{trans('strings.store')}}</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th>{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($maintenances as $maintenance)

      <tr>
        <td>{{ $maintenance->id or 'Blank'  }}</td>
        <td>{{ $maintenance->name or 'Blank' }}</td>
        <td>{{ $maintenance->provider->username or 'Blank' }}</td>
        <td>{{ $maintenance->provider->store->name or 'Blank' }}</td>
        <td>{{ $maintenance->created_at or 'Blank' }}</td>
        <td><span class="{{ $maintenance->state->label }}">{{ $maintenance->state->name or 'Blank' }}</span></td>

        <td>
          <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

      </tr>

    @endforeach

  </table>

@stop
