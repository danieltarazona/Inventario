@extends('layouts.app')

@section('content')


<h1>Detail Store</h1>

<h3>ID: {{ $product->id }}</h3>
<h3>Name: {{ $product->name }}</h3>
<h3>Category: {{ $product->category->name or 'Blank' }}</h3>
<h3>provider: {{ $product->provider->name or 'Blank' }}</h3>
<h3>State: {{ $product->state->name or 'Blank' }}</h3>
<h3>Store: {{ $product->store->name or 'Blank' }}</h3>
<h3>Stock: {{ $product->stock or 'Blank' }}</h3>
<h3>Serial: {{ $product->serial or 'Blank' }}</h3>
<h3>Model: {{ $product->year or 'Blank' }}</h3>
<h3>Buy Date: {{ $product->buy or 'Blank' }}</h3>
<h3>Price: {{ $product->price or 'Blank' }}</h3>
<h3>Warranty: {{ $product->warranty or 'Blank' }} Months</h3>

<br>
<h1>Product repairs</h1>

<table class="table">

<thead>
   <tr>
     <th>ID</th>
     <th>Product Name</th>
   </tr>
</thead>

@foreach($product->repairs as $repair)
   <tr>
    <td>{{ $repair->id }}</td>
    <td>{{ $repair->name }}</td>
  </tr>
@endforeach

</table>

@stop
