@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Maintenances')}}</h1>

  <br>

  <a href="{{ route('maintenances.create') }}" class="btn btn-primary">{{trans('strings.Create')}}</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.Provider')}}</th>
        <th>{{trans('strings.Store')}}</th>
        <th>{{trans('strings.Date')}}</th>
        <th>{{trans('strings.State')}}</th>
        <th>{{trans('strings.Actions')}}</th>
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
