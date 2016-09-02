@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  <button type="button" class="btn btn-default">
    <a href="{{ route('categories.index') }}">
      <span class="fa fa-th"></span>
    </a>
    &nbsp | &nbsp
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  <br>

  @foreach ($categories as $category)
    <a href="{{ route('categories.edit', $category->id) }}"><img class="card" src="{{ $category->photo }}" alt=""/>
    </a>
    <h5>{{ $category->name }}</h5>

  @endforeach
@stop
