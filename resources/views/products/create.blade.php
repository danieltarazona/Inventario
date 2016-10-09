@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Create')}}</h1>

{!! Form::open(['route' => 'products.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.Image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Stock', trans('strings.Stock')) !!}
  {!! Form::text('stock', null, ['class' => 'form-control']) !!}

  {!! Form::label('Serial', trans('strings.Serial')) !!}
  {!! Form::text('serial', null, ['class' => 'form-control']) !!}

  {!! Form::label('Year', trans('strings.Year')) !!}
  {!! Form::text('year', null, ['class' => 'form-control']) !!}

  {!! Form::label('Price', trans('strings.Price')) !!}
  {!! Form::text('price', null, ['class' => 'form-control']) !!}

  {!! Form::label('Warranty', trans('strings.Warranty')) !!}
  {!! Form::text('warranty', null, ['class' => 'form-control']) !!}

  {!! Form::label('Date Buy', trans('strings.BuyDate')) !!}
  {!! Form::date('date', null, ['class' => 'form-control']) !!}

  {!! Form::label('Region', trans('strings.Region')) !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label('City', trans('strings.City')) !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {!! Form::label('Store', trans('strings.Store')) !!}
  {!! Form::select('store_id', $stores, null, ['class' => 'form-control']) !!}

  {!! Form::label('Category', trans('strings.Category')) !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  {!! Form::label('provider', trans('strings.Provider')) !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit(trans('strings.Create'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
