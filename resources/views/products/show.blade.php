@extends('layouts.app')

@section('content')


<h1>Profile Product</h1>

<h3>{{ $product->id }}</h3>
<h3>{{ $product->name }}</h3>
<h3>{{ $product->category_id or 'Blank' }}</h3>
<h3>{{ $product->manufacturer_id or 'Blank' }}</h3>
<h3>{{ $product->owner_id or 'Blank' }}</h3>
<h3>{{ $product->state_id or 'Blank' }}</h3>
<h3>{{ $product->store_id or 'Blank' }}</h3>
<h3>{{ $product->stock or 'Blank' }}</h3>
<h3>{{ $product->serial or 'Blank' }}</h3>
<h3>{{ $product->year or 'Blank' }}</h3>
<h3>{{ $product->buy or 'Blank' }}</h3>
<h3>{{ $product->price or 'Blank' }}</h3>
<h3>{{ $product->warranty or 'Blank' }}</h3>
<h3>{{ $product->maintenance_id or 'Blank' }}</h3>
<h3>{{ $product->next_maintenance or 'Blank' }}</h3>

@stop
