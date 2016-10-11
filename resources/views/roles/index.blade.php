@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.roles')}}</h1>

  <br>

  <a href="{{ route('roles.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($roles as $role)
      <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
