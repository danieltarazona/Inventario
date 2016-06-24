@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'patch')) !!}

  <input type="textbox" name="name"      value="{{ $maintenance->name }}"     placeholder="Name">
  <input type="date" name="date"         value="{{ $maintenance->date }}"     placeholder="Date">
  <input type="textbox" name="price"     value="{{ $maintenance->price }}"    placeholder="Price">
  <br>
  <br>

  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control')) !!}
  <br>

  <textarea class="form-control" name="description" cols="40" rows="5" placeholder="Description" value="{{ $maintenance->description }}"></textarea>
  <br>

  <input type="submit" class="btn btn-success" name="submit" value="Save">

{!! Form::close() !!}

@stop
