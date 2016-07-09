@extends('layouts.app')

@section('content')

<h1>Detail Maintenance</h1>

<h3>ID {{ $maintenance->id }}</h3>
<h3>Date {{ $maintenance->created_at }}</h3>
<h3>Name {{ $maintenance->name }}</h3>
<h3>Seller {{ $maintenance->seller_id or 'Blank' }}</h3>
<h3>Description {{ $maintenance->description }}</h3>


<br>
<h1>Products Maintenance</h1>

<table class="table">

<thead>
   <tr>
     <th>ID</th>
     <th>Product Name</th>
   </tr>
</thead>

@foreach($maintenance->products as $product)
   <tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
  </tr>
@endforeach

</table>


@stop
