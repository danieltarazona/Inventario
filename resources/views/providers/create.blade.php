@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'providers']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone') !!}
  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

  {!! Form::label('Adress') !!}
  {!! Form::text('adress', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
