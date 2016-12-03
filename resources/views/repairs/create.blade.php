@extends('layouts.app')

@section('content')

<h1>{{trans('strings.repair')}}</h1>

{!! Form::open(['url' => 'repairs']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description', trans('strings.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {!! Form::label('Provider', trans('strings.provider')) !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.continue'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
