@extends('layouts.app')

@section('content')

  <h1>Maintenances</h1>

  <br>

  <a href="{{ route('maintenances.create') }}" class="btn btn-primary">Create</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        @if(Auth::user()->role_id > 2)
          <th>Provider</th>
        @endif
        @if(Auth::user()->role_id > 1)
          <th>Storer</th>
        @endif
        <th>Create</th>
        <th>State ID</th>
        <th>State</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($maintenances as $maintenance)

      <tr>
        <td>{{ $maintenance->id or 'Blank'  }}</td>
        <td>{{ $maintenance->name or 'Blank' }}</td>
        @if(Auth::user()->role_id > 2)
          <td>{{ $maintenance->provider_id or 'Blank' }}</td>
        @endif
        @if(Auth::user()->role_id > 1)
          <td>{{ $maintenance->user_id or 'Blank' }}</td>
        @endif
        <td>{{ $maintenance->created_at or 'Blank' }}</td>
        <td>{{ $maintenance->state->id }}</td>

        @if($maintenance->state->name == 'Waiting')
          <td><span class="label label-warning">{{ $maintenance->state->name or 'Blank' }}</span></td>
        @endif

        @if($maintenance->state->name == 'Complete')
          <td><span class="label label-primary">{{ $maintenance->state->name or 'Blank' }}</span></td>
        @endif

        @if($maintenance->state->name == 'Product or Products Not Found')
          <td><span class="label label-danger">{{ $maintenance->state->name or 'Blank'  }}</span></td>
        @endif

        @if($maintenance->state->name == 'Returned')
          <td><span class="label label-success">{{ $maintenance->state->name or 'Blank'  }}</span></td>
        @endif

        @if($maintenance->state->name == 'Cancelled')
          <td><span class="label label-default">{{ $maintenance->state->name or 'Blank'  }}</span></td>
        @endif

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
