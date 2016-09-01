@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['route' => 'categories.store', 'files' => true, 'method' => 'post']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo') !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
