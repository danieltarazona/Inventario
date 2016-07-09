@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'cities']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
