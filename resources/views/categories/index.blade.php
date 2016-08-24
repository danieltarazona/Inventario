@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  {!! Form::open(['url' => 'categories']) !!}
    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <br>
    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
  {!! Form::close() !!}

  <br>
  
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
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Update</a>
      </td>
      <td>
        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
        <button class="btn btn-danger" type="submit" >Delete</button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
@stop
