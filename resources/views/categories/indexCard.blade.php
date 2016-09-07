@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  <button type="button" class="btn btn-default">
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th"></span>
    </a>
  </button>
  <button type="button" class="btn btn-default">

    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  <br>
  <hr>

  @foreach ($categories as $category)

    <a href="{{ route('categories.show', $category->id) }}"><img class="card" style="height:150px; width:150px;" src="{{ $category->photo }}" alt=""/>
    </a>
    <h5>{{ $category->name }}</h5>

  @endforeach
@stop
