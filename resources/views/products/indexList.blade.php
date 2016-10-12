@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.products')}}</h1>

  <br>

  <a href="{{ route('products.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <button type="button" class="btn btn-default">
    <a href="{{ route('categories.index') }}">
      <span class="fa fa-th"></span>
    </a>
    &nbsp | &nbsp
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  {!! Form::open(['route' => ['products.search'], 'method' => 'GET']) !!}

  <br>
  <div class="search">
    <div class="col-md-12">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
    </div>
  </div>
  <br>

  {!! Form::close() !!}

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.image')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th>{{trans('strings.serial')}}</th>
        <th colspan="3">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    {{ $products->links() }}

    @foreach ($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
        <td><span class="{{ $product->state->label }}">{{ $product->state->name }}</span></td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>
          <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>
        <td>
          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@stop
