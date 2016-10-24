@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.events') }}</h1>

  <br>

  {!! Form::open(['route' => 'events.store', 'method' => 'POST']) !!}

  {!! Form::label('Start', trans('strings.hour_start')) !!}
  {!! Form::time('start', $start->toTimeString(), ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.hour_end')) !!}
  {!! Form::time('end', $end->toTimeString(), ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', $date, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.order'), array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  <br>

  <button class="btn btn-warning" type="submit">
    {{ trans('strings.repair') }}
  </button>

  {!! Form::open(['route' => 'events.search', 'method' => 'POST']) !!}

  <br>

  <input type="date" name="date_search" value="{{ $date_search }}">

  <br>

  {{ Form::submit(trans('strings.search'), array('class' => 'btn btn-primary')) }}

  {!! Form::close() !!}

  <hr>

  @include('events.day')

  <br>

  @include('events.week')

  <br>

  @include('events.month')

  @endsection
