@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['route' => 'roles.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
