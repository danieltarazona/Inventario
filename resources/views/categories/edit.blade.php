@extends('layouts.app')

@section('content')

<h1>Edit</h1>

<p><a href="{{ url('categories') }}">Categories</a> / {{ $category->name }}</p>

{!! Form::open(array('route' => array('categories.update', $category->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

  {!! Form::label('Photo') !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description') !!}
  {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
