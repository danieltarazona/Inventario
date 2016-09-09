@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('states.update', $state->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $state->name, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
