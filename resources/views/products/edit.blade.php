@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('products.update', $product->id), 'method' => 'patch')) !!}

  {!! Form::label('Name') !!}
  <input type="textbox" name="name"      value="{{ $product->name }}"     placeholder="Name">

  {!! Form::label('Stock') !!}
  <input type="textbox" name="stock"     value="{{ $product->stock }}"    placeholder="Numeric">

  {!! Form::label('Serial') !!}
  <input type="textbox" name="serial"    value="{{ $product->serial }}"   placeholder="ABCD">

  {!! Form::label('Model') !!}
  <input type="textbox" name="year"      value="{{ $product->year }}"     placeholder="Year">

  {!! Form::label('Price') !!}
  <input type="textbox" name="price"     value="{{ $product->price }}"    placeholder="Numeric">

  <br>
  {!! Form::label('Warranty') !!}
  <input type="textbox" name="warranty"  value="{{ $product->warranty }}" placeholder="Months">

  {!! Form::label('Buy Date') !!}
  <input type="date" name="buy" value="{{ $product->buy }}">

  <br>

  {!! Form::label('State') !!}
  {!! Form::select('state_id', $states, $product->state_id) !!}

  {!! Form::label('Category') !!}
  {!! Form::select('category_id', $categories, $product->category_id) !!}

  {!! Form::label('Manufacturer') !!}
  {!! Form::select('manufacturer_id', $manufacturers, $product->manufacturer_id) !!}

  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, $product->city_id) !!}

  {!! Form::label('Store') !!}
  {!! Form::select('store_id', $stores, $product->store_id) !!}

  <br>

  <input type="submit" class="btn btn-success" name="submit" value="Save">

{!! Form::close() !!}

@stop
