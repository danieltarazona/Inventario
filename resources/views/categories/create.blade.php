@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'categories.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.Image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description', trans('strings.Description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
