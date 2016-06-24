@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(array('route' => array('products.store'), 'method' => 'post')) !!}

  <input type="textbox" name="name" placeholder="Name">
  <input type="textbox" name="stock" placeholder="Stock">
  <input type="textbox" name="serial" placeholder="Serial">
  <input type="textbox" name="year" placeholder="Model">
  <input type="textbox" name="price" placeholder="Price">
  <input type="textbox" name="warranty" placeholder="warranty">
  <input type="date" name="buy" placeholder="Buy">

  {!! Form::select('category_id', $categories) !!}
  {!! Form::select('store_id', $stores) !!}
  {!! Form::select('manufacturer_id', $manufacturers) !!}
  {!! Form::select('state_id', $states) !!}

  <input type="submit" class="btn btn-success" name="submit" value="Create">

{!! Form::close() !!}

@stop
