@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['url' => 'maintenances']) !!}

  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Products') !!}
  {!! Form::select('product_id[]', $products, null, array('multiple'=>'multiple', 'class' => 'form-control')) !!}

  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
