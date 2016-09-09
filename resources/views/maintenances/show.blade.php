@extends('layouts.app')

@section('content')

<h1>Detail Maintenance</h1>

<h3>ID: {{ $maintenance->id }}</h3>
<h3>State: {{ $maintenance->state->name }}</h3>
<h3>Create: {{ $maintenance->created_at }}</h3>
<h3>Name: {{ $maintenance->name }}</h3>
<h3>Storer: {{ $maintenance->user->username or 'Blank' }}</h3>
<h3>Description: {{ $maintenance->description }}</h3>

<br>
<h1>Products in Maintenance</h1>

<table class="table">
<thead>
   <tr>
     <th>ID</th>
     <th></th>
     <th>Product</th>
     <th>Category</th>
     <th>Provider</th>
     <th>Store</th>
     <th>Stock</th>
     <th>Serial</th>
     <th>Year/Month/Day</th>
     <th>Warrany</th>
   </tr>
</thead>

@foreach($maintenance->product as $product)
   <tr>
    @include('maintenances.list')
  </tr>
@endforeach

</table>


@stop
