@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'orders']) !!}

  {!! Form::label('Date') !!}
  {!! Form::date('date', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
