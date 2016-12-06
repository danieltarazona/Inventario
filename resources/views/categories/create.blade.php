@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'categories.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description', trans('strings.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.create'), ['name' => trans('strings.create'), 'class' => 'btn btn-success']) }}

{!! Form::close() !!}

@stop
