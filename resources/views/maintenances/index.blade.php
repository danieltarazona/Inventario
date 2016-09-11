@extends('layouts.app')

@section('content')

  <h1>Maintenances</h1>

  <a href="{{ route('maintenances.create') }}" class="btn btn-success">Create</a>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        @if(Auth::user()->role_id > 2)
          <th>Storer</th>
        @endif
        <th>State</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>

    @foreach ($maintenances as $maintenance)

      <tr>
        <td>{{ $maintenance->id }}</td>
        <td>{{ $maintenance->name }}</td>
        @if(Auth::user()->role_id > 2)
          <td>{{ $maintenance->user_id or 'Blank' }}</td>
        @endif
        
        @if($maintenance->state->name == 'Done')
          <td><span class="label label-success">{{ $maintenance->state->name }}</span></td>
        @endif

        @if($maintenance->state->name == 'Waiting')
          <td><span class="label label-warning">{{ $maintenance->state->name }}</span></td>
        @endif

        @if($maintenance->state->name == 'Product or Products Not Found')
          <td><span class="label label-danger">{{ $maintenance->state->name }}</span></td>
        @endif

        @if($maintenance->state->name == 'Return')
          <td><span class="label label-primary">{{ $maintenance->state->name }}</span></td>
        @endif

        @if($maintenance->state->name == 'Cancelled')
          <td><span class="label label-default">{{ $maintenance->state->name }}</span></td>
        @endif
        <td>{{ $maintenance->created_at or 'Blank' }}</td>

        <td>
          <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        @if(Auth::user()->role_id > 2)
        <td>
          {!! Form::open(['route' => ['maintenances.destroy', $maintenance->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          {!! Form::close() !!}
        </td>
        @endif
      </tr>

    @endforeach

  </table>

@stop
