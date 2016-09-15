@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Maintenance')}} {{ $maintenance->id }}</h1>

  <h3>{{trans('strings.State')}}: {{ $maintenance->state->name }}</h3>
  <h3>{{trans('strings.Create')}}: {{ $maintenance->created_at }}</h3>
  <h3>{{trans('strings.Name')}}: {{ $maintenance->name }}</h3>
  <h3>{{trans('strings.Store')}}: {{ $maintenance->user->username or 'Blank' }}</h3>
  <h3>{{trans('strings.Provider')}}: </h3>
  <h4>{{ $maintenance->description }}</h4>
</h3>

<br>
<h1>{{trans('strings.ProdMaint')}}</h1>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th></th>
      <th>{{trans('strings.Product')}}</th>
      <th>{{trans('strings.Category')}}</th>
      <th>{{trans('strings.Store')}}</th>
      <th>{{trans('strings.Stock')}}</th>
      <th>{{trans('strings.Serial')}}</th>
      <th>{{trans('strings.Warranty')}}</th>
      <th>{{trans('strings.Quantity')}}</th>
    </tr>
  </thead>

  @foreach($maintenance->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
      <td><a href="/categories/{{$product->category_id}}">{{ $product->category->name or 'Blank' }}</a></td>
      <td>{{ $product->store->name or 'Blank' }}</td>
      <td>{{ $product->stock or 'Blank' }}</td>
      <td>{{ $product->serial or 'Blank' }}</td>
      <td>{{ $product->warranty or 'Blank' }} Months</td>
      <td>{{ $product->pivot->quantity or 'Blank' }}</td>

    </tr>
  @endforeach
</table>


@stop
