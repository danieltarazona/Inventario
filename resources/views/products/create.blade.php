@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'products']) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Stock') !!}
  {!! Form::text('stock', null, ['class' => 'form-control']) !!}

  {!! Form::label('Serial') !!}
  {!! Form::text('serial', null, ['class' => 'form-control']) !!}

  {!! Form::label('Year') !!}
  {!! Form::text('year', null, ['class' => 'form-control']) !!}

  {!! Form::label('Price') !!}
  {!! Form::text('price', null, ['class' => 'form-control']) !!}

  {!! Form::label('Warranty') !!}
  {!! Form::text('warranty', null, ['class' => 'form-control']) !!}

  {!! Form::label('Date Buy') !!}
  {!! Form::date('date', null, ['class' => 'form-control']) !!}

  {!! Form::label('State') !!}
  {!! Form::select('state_id', $states, null, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}

  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}

  {!! Form::label('Store') !!}
  {!! Form::select('store_id', $stores, null, ['class' => 'form-control']) !!}

  {!! Form::label('Category') !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  {!! Form::label('provider') !!}
  {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
