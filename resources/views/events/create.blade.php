@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.events') }}</h1>

  <br>

  {!! Form::open(['route' => 'events.store', 'method' => 'POST']) !!}

  {!! Form::label('Start', trans('strings.hour_start')) !!}
  {!! Form::time('start', $start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.hour_end')) !!}
  {!! Form::time('end', $end, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', $date, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.continue'), array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  <br>

  {!! Form::open(['route' => 'events.search', 'method' => 'POST']) !!}

  <br>

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date_search', $date_search, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.search'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  @include('events.day')

  <br>

@stop

  <!--

  @include('events.week')

  <br>

  @include('events.month')

  -!>
