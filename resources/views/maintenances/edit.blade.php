@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::model(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'PATCH')) !!}

  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('price', 'Price') !!}
  {!! Form::text('price', null, ['class' => 'form-control']) !!}

  {!! Form::label('quantity', 'Quantity') !!}
  {!! Form::text('quantity', null, ['class' => 'form-control']) !!}

  {!! Form::label('Seller') !!}
  {!! Form::select('seller_id', $sellers, null, ['class' => 'form-control']) !!}

  {!! Form::label('Products') !!}
  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control')) !!}

  {!! Form::label('Description') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
