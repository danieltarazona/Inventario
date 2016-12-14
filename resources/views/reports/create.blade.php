@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}}</h1>

  <hr>


      {!! Form::open(['route' => ['reports.store', $range->id], 'method' => 'GET']) !!}
      <button class="btn btn-success" type="submit" name="{{ trans('strings.generate') }}">
        {{trans('strings.generate')}}</button>
      {!! Form::close() !!}

    @stop
