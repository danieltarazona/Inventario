@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(array('route' => array('products.store'), 'method' => 'post')) !!}

  {!! Form::label('Name') !!}
  <input type="textbox" name="name" placeholder="Name">

  {!! Form::label('Stock') !!}
  <input type="textbox" name="stock" placeholder="Stock">

  {!! Form::label('Serial') !!}
  <input type="textbox" name="serial" placeholder="Serial">

  {!! Form::label('Model') !!}
  <input type="textbox" name="year" placeholder="Year">

  {!! Form::label('Price') !!}
  <input type="textbox" name="price" placeholder="Price">

  {!! Form::label('Warranty') !!}
  <input type="textbox" name="warranty" placeholder="Months">

  {!! Form::label('Date Buy') !!}
  <input type="date" name="date">

  {!! Form::label('State') !!}
  {!! Form::select('state_id', $states) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions) !!}

  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities) !!}

  {!! Form::label('Store') !!}
  {!! Form::select('store_id', $stores) !!}

  {!! Form::label('Category') !!}
  {!! Form::select('category_id', $categories) !!}

  {!! Form::label('Manufacturer') !!}
  {!! Form::select('manufacturer_id', $manufacturers) !!}

  <input type="submit" class="btn btn-success" name="submit" value="Create">

{!! Form::close() !!}

@stop
