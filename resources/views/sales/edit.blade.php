@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(['url' => 'sales']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone') !!}
  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

  {!! Form::label('Adress') !!}
  {!! Form::text('adress', null, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
