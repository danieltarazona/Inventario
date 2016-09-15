@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['route' => 'orders.store', 'method' => 'POST']) !!}

  {!! Form::label('Start Hour') !!}

  {!! Form::time('start', $start, ['class' => 'form-control']) !!}

  {!! Form::label('End Hour') !!}
  {!! Form::time('end', $end, ['class' => 'form-control']) !!}

  {!! Form::label('Date') !!}
  {!! Form::date('date', $day, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
