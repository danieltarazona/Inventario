@extends('layouts.app')

@section('content')

<h1>{{trans('strings.create')}}</h1>

{!! Form::open(['url' => 'orders']) !!}

  {!! Form::label('Start', trans('strings.hour_start')) !!}
  {!! Form::time('start', $start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.hour_end')) !!}
  {!! Form::time('end', $start, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', $day, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.create'), ['name' => trans('strings.create'), 'class' => 'btn btn-success'] ) }}

{!! Form::close() !!}

@stop
