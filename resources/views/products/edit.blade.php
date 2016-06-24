@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('products.update', $product->id), 'method' => 'patch')) !!}

  <input type="textbox" name="name"      value="{{ $product->name }}"     placeholder="Name">
  <input type="textbox" name="stock"     value="{{ $product->stock }}"    placeholder="Stock">
  <input type="textbox" name="serial"    value="{{ $product->serial }}"   placeholder="Serial">
  <input type="textbox" name="year"      value="{{ $product->year }}"     placeholder="Model">
  <input type="textbox" name="price"     value="{{ $product->price }}"    placeholder="Price">
  <input type="textbox" name="warranty"  value="{{ $product->warranty }}" placeholder="Warranty">
  <input type="date"    name="buy"       value="{{ $product->buy }}"      placeholder="Buy">

  {!! Form::select('category_id', $categories, $product->category_id) !!}
  {!! Form::select('store_id', $stores, $product->store_id) !!}
  {!! Form::select('manufacturer_id', $manufacturers, $product->manufacturer_id) !!}
  {!! Form::select('state_id', $states, $product->state_id) !!}

  <input type="submit" class="btn btn-success" name="submit" value="Save">

{!! Form::close() !!}

@stop
