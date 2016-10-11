@extends('layouts.app')

@section('content')

<h1>{{trans('strings.create')}}</h1>

{!! Form::open(['url' => 'stores']) !!}

  {!! Form::label(trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.telephone')) !!}
  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.adress')) !!}
  {!! Form::text('adress', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.region')) !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.city')) !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
