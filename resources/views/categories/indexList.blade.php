@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  <br>

  <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>

  <button type="button" class="btn btn-default">
    <a href="{{ route('categories.index') }}">
      <span class="fa fa-th"></span>
    </a>
    &nbsp | &nbsp
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><img src="{{ $category->photo }}" alt="{{ $category->name }}" style="weight:50px; height:50px;"/></td>
      <td><a href="/categories/{{ $category->id }}">{{ $category->name or 'Blank' }}</a></td>
      <td>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </td>
      <td>
        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
@stop
