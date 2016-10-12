@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.repair')}} {{ $repair->id }}</h1>

  <h3>{{trans('strings.state')}}: {{ $repair->state->name }}</h3>
  <h3>{{trans('strings.create')}}: {{ $repair->created_at }}</h3>
  <h3>{{trans('strings.name')}}: {{ $repair->name }}</h3>
  <h3>{{trans('strings.store')}}: {{ $repair->user->username or 'Blank' }}</h3>
  <h3>{{trans('strings.provider')}}: </h3>
  <h4>{{ $repair->description }}</h4>
</h3>

<br>
<h1>{{trans('strings.product_repair')}}</h1>

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
    </tr>
  </thead>

  @foreach($repair->product as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
      <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
      <td><a href="/categories/{{$product->category_id}}">{{ $product->category->name or 'Blank' }}</a></td>
      <td>{{ $product->store->name or 'Blank' }}</td>
      <td>{{ $product->serial or 'Blank' }}</td>
      <td>{{ $product->warranty or 'Blank' }} Months</td>

    </tr>
  @endforeach
</table>


@stop
