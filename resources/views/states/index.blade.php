@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.states')}}</h1>

  <br>

  {!! Form::open(['url' => 'states']) !!}

    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Label', trans('strings.label')) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.label')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($states as $state)
      <tr>
        <td>{{ $state->id }}</td>
        <td>{{ $state->name }}</td>
        <td>{{ $state->label }}</td>
        <td>
          <a href="{{ route('states.edit', $state->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
