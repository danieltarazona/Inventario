@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Edit')}}</h1>

{!! Form::open(array('route' => array('regions.update', $region->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', $region->name, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Save'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
