@extends('layouts.app')

@section('content')

<h1>{{trans('strings.create')}}</h1>

{!! Form::open(['url' => 'repairs']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  @if(Auth::user()->role_id == 2)
  {!! Form::label('Description', trans('strings.description')) !!}
  {!! Editor::view($repair->description) !!}
  @endif

  {!! Form::label('Provider', trans('strings.provider')) !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
