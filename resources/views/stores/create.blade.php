@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['url' => 'stores']) !!}

  {!! Form::label(trans('strings.Name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Telephone')) !!}
  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Adress')) !!}
  {!! Form::text('adress', null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Region')) !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.City')) !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
