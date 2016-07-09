@extends('layouts.app')

@section('content')


<h1>Detail Category</h1>

<h3>ID: {{ $category->id }}</h3>
<h3>Name: {{ $category->name }}</h3>

<br>
<h1>Products Category</h1>

<table class="table">

<thead>
   <tr>
     <th>ID</th>
     <th>Product Name</th>
   </tr>
</thead>

@foreach($category->products as $product)
   <tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
  </tr>
@endforeach

</table>

@stop
