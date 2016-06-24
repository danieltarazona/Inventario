@extends('layouts.app')

@section('content')

<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-success">Create</a>

<table class="table">
  <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Category</th>
       <th>Manufacturer</th>
       <th>Owner</th>
       <th>State</th>
       <th>Store</th>
       <th>Stock</th>
       <th>Serial</th>
       <th>Model</th>
       <th colspan="1">Buy Date</th>
       <th>Price</th>
       <th>Warranty</th>
       <th>Maintenance</th>
       <th colspan="3">Actions</th>
     </tr>
   </thead>

   @foreach ($products as $product)

     <tr>
       <td>{{ $product->id }}</td>
       <td>{{ $product->name }}</td>
       <td>{{ $product->category_id or 'Blank' }}</td>
       <td>{{ $product->manufacturer_id or 'Blank' }}</td>
       <td>{{ $product->owner_id or 'Blank' }}</td>
       <td>{{ $product->state_id or 'Blank' }}</td>
       <td>{{ $product->store_id or 'Blank' }}</td>
       <td>{{ $product->stock or 'Blank' }}</td>
       <td>{{ $product->serial or 'Blank' }}</td>
       <td>{{ $product->year or 'Blank' }}</td>
       <td>{{ $product->buy or 'Blank' }}</td>
       <td>{{ $product->price or 'Blank' }}</td>
       <td>{{ $product->warranty or 'Blank' }}</td>
       <td>
         @foreach($product->maintenance as $maintenance)
            {{ $maintenance->id }}
         @endforeach
       </td>

       <td>
         <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Read</a>
       </td>

       <td>
         <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
       </td>

       <td>
         {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
           <button class="btn btn-danger" type="submit" >Delete</button>
         {!! Form::close() !!}
       </td>
     </tr>

   @endforeach

</table>

@stop
