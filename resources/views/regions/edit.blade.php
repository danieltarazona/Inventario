@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('regions.update', $region->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $region->name, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
