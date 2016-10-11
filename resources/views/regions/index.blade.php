@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.regions')}}</h1>

  {!! Form::open(['url' => 'regions']) !!}

    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
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
