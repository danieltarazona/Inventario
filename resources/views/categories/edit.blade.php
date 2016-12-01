@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('categories') }}">{{trans('strings.categories')}}</a> / {{ $category->name }}</p>

{!! Form::open(['route' => array('categories.update', $category->id), 'files' => true, 'method' => 'PATCH']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Description', trans('strings.description')) !!}
  {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Update'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
