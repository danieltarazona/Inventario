@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::model(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'PATCH')) !!}

  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', $maintenance->name, ['class' => 'form-control']) !!}

  {!! Form::label('Description') !!}
  {!! Form::textarea('description', $maintenance->description, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
