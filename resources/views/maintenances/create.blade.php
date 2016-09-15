@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['url' => 'maintenances']) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  @if(Auth::user()->role_id == 2)
  {!! Form::label('Description', trans('strings.Description')) !!}
  {!! Editor::view($maintenance->description) !!}
  @endif

  {!! Form::label('Provider', trans('strings.Provider')) !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
