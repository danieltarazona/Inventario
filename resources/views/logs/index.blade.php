@extends('layouts.app')

@section('content')

  @foreach($logs as $log)

    {{ $log->name }}
    {{ $log->description }}
    {{ $log->user_id }}

  @endforeach

@stop
