@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'maintenances']) !!}

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

  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
