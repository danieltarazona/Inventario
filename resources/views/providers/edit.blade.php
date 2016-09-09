@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('providers.update', $provider->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $provider->name, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone') !!}
  {!! Form::text('telephone', $provider->telephone, ['class' => 'form-control']) !!}

  {!! Form::label('Adress') !!}
  {!! Form::text('adress', $provider->adress, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
