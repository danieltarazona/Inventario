@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.maintenance')}} {{ $maintenance->id }}</h1>

  <h3>{{trans('strings.state')}}: {{ $maintenance->state->name }}</h3>
  <h3>{{trans('strings.create')}}: {{ $maintenance->created_at }}</h3>
  <h3>{{trans('strings.name')}}: {{ $maintenance->name }}</h3>
  <h3>{{trans('strings.store')}}: {{ $maintenance->user->username or 'Blank' }}</h3>
  <h3>{{trans('strings.provider')}}: </h3>
  <h4>{{ $maintenance->description }}</h4>
</h3>

<br>
<h1>{{trans('strings.product_maintenance')}}</h1>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th></th>
      <th>{{trans('strings.product')}}</th>
      <th>{{trans('strings.category')}}</th>
      <th>{{trans('strings.store')}}</th>
      <th>{{trans('strings.stock')}}</th>
      <th>{{trans('strings.serial')}}</th>
      <th>{{trans('strings.warranty')}}</th>
      <th>{{trans('strings.quantity')}}</th>
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
