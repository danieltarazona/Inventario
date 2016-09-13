@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['url' => 'maintenances']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  @if(Auth::user()->role_id == 2)
  {!! Form::label('Description') !!}
  {!! Editor::view($maintenance->description) !!}
  @endif

  {!! Form::label('Provider') !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
