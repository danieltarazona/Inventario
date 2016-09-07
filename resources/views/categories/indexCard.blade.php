@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  {!! Form::open(['route' => 'categories.store', 'files' => true, 'method' => 'post']) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Photo') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}

    {!! Form::label('Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

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
