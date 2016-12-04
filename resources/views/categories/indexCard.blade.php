@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.categories')}}</h1>

  <hr>

  @foreach ($categories as $category)

    @include('categories.card')

  @endforeach
@stop
