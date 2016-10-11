@extends('layouts.app')

@section('content')

<h1>{{trans('strings.create')}}</h1>

{!! Form::open(['route' => 'roles.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
