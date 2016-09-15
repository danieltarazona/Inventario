@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Edit')}}</h1>

<p><a href="{{ url('categories') }}">{{trans('strings.Categories')}}</a> / {{ $category->name }}</p>

{!! Form::open(array('route' => array('categories.update', $category->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.Image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description', trans('strings.Description')) !!}
  {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
