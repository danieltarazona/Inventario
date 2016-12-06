@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

{!! Form::open(array('route' => array('products.update', $product->id), 'method' => 'PATCH')) !!}

{!! Form::label('Name', trans('strings.name')) !!}
{!! Form::text('name', $product->name, ['class' => 'form-control']) !!}

{!! Form::label('Serial', trans('strings.serial')) !!}
{!! Form::text('serial', $product->serial, ['class' => 'form-control']) !!}

@if (Auth::user()->role_id > 3)
  {!! Form::label('Warranty', trans('strings.warranty')) !!}
  {!! Form::text('warranty', $product->warranty, ['class' => 'form-control']) !!}

  {!! Form::label('Year', trans('strings.year')) !!}
  {!! Form::text('year', $product->year, ['class' => 'form-control']) !!}

  {!! Form::label('Price', trans('strings.price')) !!}
  {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.buy_date')) !!}
  {!! Form::date('date', $product->date, ['class' => 'form-control']) !!}

  {!! Form::label('State', trans('strings.state')) !!}
  {!! Form::select('state_id', $states, $product->state_id, ['class' => 'form-control']) !!}

  {!! Form::label('Region', trans('strings.region')) !!}
  {!! Form::select('region_id', $regions, $product->region_id, ['class' => 'form-control']) !!}

  {!! Form::label('City', trans('strings.city')) !!}
  {!! Form::select('city_id', $cities, $product->city_id, ['class' => 'form-control']) !!}

  {!! Form::label('Store', trans('strings.store')) !!}
  {!! Form::select('store_id', $stores, $product->store_id, ['class' => 'form-control']) !!}
@endif

{!! Form::label('Category', trans('strings.category')) !!}
{!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}

{!! Form::label('Provider', trans('strings.provider')) !!}
{!! Form::select('provider_id', $providers, $product->provider_id, ['class' => 'form-control']) !!}

{{ Form::submit(trans('strings.save'), array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
