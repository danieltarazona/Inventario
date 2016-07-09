@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  @if (Auth::user()->rol_id == 3)

  {!! Form::open(['url' => 'categories']) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

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

        @if (Auth::user()->rol_id > 1)
          <td>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Update</a>
          </td>

          @if (Auth::user()->rol_id > 2)
            <td>
              {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
              <button class="btn btn-danger" type="submit" >Delete</button>
              {!! Form::close() !!}
            </td>
          @endif

        @endif

      </tr>

    @endforeach

  </table>

@stop
