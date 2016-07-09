@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'categories']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
