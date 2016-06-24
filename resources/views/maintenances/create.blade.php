@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(array('route' => array('maintenances.store'), 'method' => 'post')) !!}

  <input type="textbox" name="name" placeholder="Name">
  <input type="textbox" name="price" placeholder="Price">
  <input type="date" name="date" placeholder="Date">

  <br>
  <br>
  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control')) !!}

  <br>
  <textarea class="form-control" name="description" cols="40" rows="5" placeholder="Description"></textarea>
  <br>

  <input type="submit" class="btn btn-success" name="submit" value="Create">

{!! Form::close() !!}

@stop
