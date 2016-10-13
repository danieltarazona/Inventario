@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.events') }}</h1>

  <br>

  {!! Form::open(['url' => 'events']) !!}

  {!! Form::label('Start', trans('strings.hour_start')) !!}
  {!! Form::time('start', $start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.hour_end')) !!}
  {!! Form::time('end', $end, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', $date, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.order'), array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  <button class="btn btn-warning" type="submit">
    {{ trans('strings.repair') }}
  </button>

  <hr>

  @include('events.day')

  <br>

  @include('events.week')

  <br>

  @include('events.month')

  @endsection
