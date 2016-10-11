@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Products')}}</h1>

  <br>

  <a href="{{ route('products.create') }}" class="btn btn-primary">{{trans('strings.Create')}}</a>

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
    <div class="col-lg-6">
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

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Image')}}</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.Category')}}</th>
        <th>{{trans('strings.Provider')}}</th>
        <th>{{trans('strings.Store')}}</th>
        <th>{{trans('strings.State')}}</th>
        <th>{{trans('strings.Serial')}}</th>
        <th>{{trans('strings.Model')}}</th>
        <th>{{trans('strings.Buy')}}</th>
        <th>{{trans('strings.Price')}}</th>
        <th>{{trans('strings.Warranty')}}</th>
        <th>{{trans('strings.Actions')}}</th>
      </tr>
    </thead>

    @foreach ($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->username or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td><span class="{{ $product->state->label }}">{{ $product->state->name }}</span></td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->year or 'Blank' }}</td>
        <td>{{ $product->created_at->year or 'Blank' }}</td>
        <td>{{ $product->price or 'Blank' }}</td>
        <td>{{ $product->warranty or 'Blank' }} {{trans('strings.months')}}</td>
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
