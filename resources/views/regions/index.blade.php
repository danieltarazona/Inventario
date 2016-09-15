@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Regions')}}</h1>

  {!! Form::open(['url' => 'regions']) !!}

    {!! Form::label('Name', trans('strings.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.Actions')}}</th>
      </tr>
    </thead>

    @foreach ($regions as $region)

      <tr>
        <td>{{ $region->id }}</td>
        <td>{{ $region->name }}</td>

        @if (Auth::user()->role_id > 1)
        <td>
          <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        <td>
          {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop
