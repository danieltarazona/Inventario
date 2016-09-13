@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('sales.update', $sale->id), 'method' => 'PATCH')) !!}

{!! Form::close() !!}

@stop
