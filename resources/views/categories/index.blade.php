@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  @if (Auth::user()->isAdmin())
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach ($categories as $category)

      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name or 'Blank' }}</td>

        <td>
          <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Read</a>
        </td>

        @if (Auth::user()->isSeller())
          <td>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Update</a>
          </td>
        @endif

        @if (Auth::user()->isAdmin())
          <td>
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
            <button class="btn btn-danger" type="submit" >Delete</button>
            {!! Form::close() !!}
          </td>
        @endif

      </tr>

    @endforeach

  </table>

@stop
