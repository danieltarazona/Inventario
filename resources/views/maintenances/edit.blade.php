@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'patch')) !!}

  {!! Form::label('Name') !!}
  <input type="textbox" name="name" value="{{ $maintenance->name }}" placeholder="Name">

  {!! Form::label('Price') !!}
  <input type="textbox" name="price" value="{{ $maintenance->price }}" placeholder="Numeric">

  {!! Form::label('Quantity') !!}
  <input type="textbox" name="quantity" placeholder="Quantity">

  {!! Form::label('Owner') !!}
  {!! Form::select('owner_id', $owners, $maintenance->owner_id) !!}
  <br>
  <br>

  {!! Form::label('Products') !!}
  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control card')) !!}
  <br>

  {!! Form::label('Description') !!}
  <textarea class="form-control" name="description" cols="40" rows="5">{{ $maintenance->description or 'Blank' }}</textarea>
  <br>

  <input type="submit" class="btn btn-success" name="submit" value="Save">

{!! Form::close() !!}

@stop
