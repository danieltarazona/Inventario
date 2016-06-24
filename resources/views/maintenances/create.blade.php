@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(array('route' => array('maintenances.store'), 'method' => 'post')) !!}

  {!! Form::label('Name') !!}
  <input type="textbox" name="name" placeholder="Name">

  {!! Form::label('Price') !!}
  <input type="textbox" name="price" placeholder="Price">

  {!! Form::label('Quantity') !!}
  <input type="textbox" name="quantity" placeholder="Quantity">

  {!! Form::label('Owner') !!}
  {!! Form::select('owner_id', $owners) !!}

  <br>
  <br>
  {!! Form::label('Products') !!}
  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control')) !!}

  <br>
  {!! Form::label('Description') !!}
  <textarea class="form-control" name="description" cols="40" rows="5" placeholder="Description"></textarea>
  <br>

  <input type="submit" class="btn btn-success" name="submit" value="Create">

{!! Form::close() !!}

@stop
