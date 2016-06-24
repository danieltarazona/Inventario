@extends('layouts.app')

@section('content')

<h1>Detail Maintenance</h1>

<h3>ID {{ $maintenance->id }}</h3>
<h3>Name {{ $maintenance->name }}</h3>
<h3>Owner {{ $maintenance->owner_id }}</h3>
<h3>Owner Name {{ $maintenance->owner->name }}</h3>
<h3>Price {{ $maintenance->price }}</h3>
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

@foreach($maintenance->product as $product)
   <tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
  </tr>
@endforeach

</table>


@stop
