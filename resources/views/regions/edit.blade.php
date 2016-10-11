@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

{!! Form::open(array('route' => array('regions.update', $region->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $region->name, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.save'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
