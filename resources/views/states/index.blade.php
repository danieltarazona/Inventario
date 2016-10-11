@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.States')}}</h1>

  <br>

  {!! Form::open(['url' => 'states']) !!}

    {!! Form::label('Name', trans('strings.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Label', trans('strings.label')) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.label')}}</th>
        <th>{{trans('strings.Actions')}}</th>
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
