@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.edit')}}</h1>

  {!! Form::open(array('route' => array('orders.update', $order->id), 'method' => 'PATCH')) !!}

  {!! Form::label('Start Hour') !!}

  {!! Form::time('start', $order->start, ['class' => 'form-control']) !!}

  {!! Form::label('End Hour') !!}
  {!! Form::time('end', $order->end, ['class' => 'form-control']) !!}

  {!! Form::label('Date') !!}
  {!! Form::date('date', $order->date, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.update'), ['name' => trans('strings.update'), 'class' => 'btn btn-warning'] ) }}

  {!! Form::close() !!}

  <br>

  {!! Form::open(['route' => ['orders.cancel', $order->id], 'method' => 'POST']) !!}
    <button class="btn btn-danger" type="submit" name="{{trans('strings.cancel')}}">
      {{ trans('strings.cancel') }}
    </button>
  {!! Form::close() !!}

@stop
