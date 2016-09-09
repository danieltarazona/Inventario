@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('products.update', $product->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $store->name, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone') !!}
  {!! Form::text('telephone', $store->telephone, ['class' => 'form-control']) !!}

  {!! Form::label('Adress') !!}
  {!! Form::text('adress', $store->adress, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, $store->region_id, ['class' => 'form-control']) !!}

  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, $store->city_id, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
