@extends('layouts.app')

@section('content')

<br>
<h1><a href="categories">{{ $category->name }}</a> / Products</h1>

<table class="table">

@foreach($category->product as $product)

  @include('products.card')

@endforeach

</table>

@stop
