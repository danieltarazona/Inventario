@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('categories.update', $category->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
