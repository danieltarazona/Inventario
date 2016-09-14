@extends('layouts.app')

@section('content')

<h1>{{trans('strigns.Edit')}}</h1>

{!! Form::open(array('route' => array('cities.update', $city->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $city->name, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, $city->region_id, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
