@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.cities')}}</h1>

  <br>

  {!! Form::open(['route' => 'cities.store', 'method' => 'POST']) !!}

    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Region', trans('strings.region')) !!}
    {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.create'), ['name' => trans('strings.create'), 'class' => 'btn btn-primary']) }}

  {!! Form::close() !!}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.region')}}</th>
        <th>{{trans('strings.stores')}}</th>
        <th colspan="3">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($cities as $city)

      <tr>
        <td>{{ $city->id }}</td>
        <td>{{ $city->name or 'Blank' }}</td>
        <td>{{ $city->region_id or 'Blank' }}</td>
        <td>{{ $city->region->name or 'Blank' }}</td>

        <td>
          <a href="{{ route('cities.show', $city->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit" name="{{trans('strings.delete')}}"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach

  </table>

@stop
