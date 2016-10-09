@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Edit')}}</h1>

{!! Form::open(array('route' => array('cities.update', $city->id), 'method' => 'PATCH')) !!}

  {!! Form::label(trans('strings.Name')) !!}
  {!! Form::text('name', $city->name, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Region')) !!}
  {!! Form::select('region_id', $regions, $city->region_id, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Save'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
