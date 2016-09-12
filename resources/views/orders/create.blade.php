@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'orders']) !!}

  {!! Form::label('Start Hour') !!}

  {!! Form::time('start', $start, ['class' => 'form-control']) !!}

  {!! Form::label('End Hour') !!}
  {!! Form::time('end', $end, ['class' => 'form-control']) !!}

  {!! Form::label('Date') !!}
  {!! Form::date('date', $day, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
