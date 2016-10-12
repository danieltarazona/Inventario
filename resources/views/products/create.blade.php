@extends('layouts.app')

@section('content')

<h1>{{trans('strings.create')}}</h1>

{!! Form::open(['route' => 'products.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Serial', trans('strings.serial')) !!}
  {!! Form::text('serial', null, ['class' => 'form-control']) !!}

  {!! Form::label('Year', trans('strings.year')) !!}
  {!! Form::text('year', null, ['class' => 'form-control']) !!}

  {!! Form::label('Price', trans('strings.price')) !!}
  {!! Form::text('price', null, ['class' => 'form-control']) !!}

  {!! Form::label('Warranty', trans('strings.warranty')) !!}
  {!! Form::text('warranty', null, ['class' => 'form-control']) !!}

  {!! Form::label('Region', trans('strings.region')) !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label('City', trans('strings.city')) !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {!! Form::label('Store', trans('strings.store')) !!}
  {!! Form::select('store_id', $stores, null, ['class' => 'form-control']) !!}

  {!! Form::label('Category', trans('strings.category')) !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  {!! Form::label('provider', trans('strings.provider')) !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
