@extends('layouts.app')

@section('content')


<h1>Profile Product</h1>

<h3>ID {{ $product->id }}</h3>
<h3>Name {{ $product->name }}</h3>
<h3>Category {{ $product->category->name or 'Blank' }}</h3>
<h3>Manufacturer {{ $product->manufacturer->name or 'Blank' }}</h3>
<h3>Owner {{ $product->owner->name or 'Blank' }}</h3>
<h3>State {{ $product->state->name or 'Blank' }}</h3>
<h3>Store {{ $product->store->name or 'Blank' }}</h3>
<h3>Stock {{ $product->stock or 'Blank' }}</h3>
<h3>Serial {{ $product->serial or 'Blank' }}</h3>
<h3>Year {{ $product->year or 'Blank' }}</h3>
<h3>Buy Date {{ $product->buy or 'Blank' }}</h3>
<h3>Price {{ $product->price or 'Blank' }}</h3>
<h3>Warranty {{ $product->warranty or 'Blank' }}</h3>
<h3>Last Maintenance {{ $product->maintenance_id or 'Blank' }}</h3>
<h3>Next Maintenance {{ $product->next_maintenance or 'Blank' }}</h3>

@stop
