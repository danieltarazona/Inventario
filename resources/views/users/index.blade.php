@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.users')}}</h1>

  {!! Form::open(['route' => ['users.search'], 'method' => 'POST']) !!}

  <br>
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <input type="text" class="form-control" name="search" placeholder="{{ trans('strings.search') }}" style="width:50%">
          <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
    </div>
  <br>

  {!! Form::close() !!}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.role_id')}}</th>
        <th>{{trans('strings.role')}}</th>
        <th>{{trans('strings.username')}}</th>
        <th>{{trans('strings.dni')}}</th>
        <th>{{trans('strings.email')}}</th>
        <th colspan="3">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($users as $user)

      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->role->id or 'Blank' }}</td>
        <td>{{ $user->role->name or 'Blank' }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->dni }}</td>
        <td>{{ $user->email }}</td>

        <td>
          <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>

        <td>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        <td>
          {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach



  </table>



@stop
