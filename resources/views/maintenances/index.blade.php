@extends('layouts.app')

@section('content')

<h1>Maintenances</h1>
<a href="{{ route('maintenances.create') }}" class="btn btn-success">Create</a>

<table class="table">
  <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Owner ID</th>
       <th>Owner Name</th>
       <th>Price</th>
       <th>Description</th>
       <th colspan="3">Actions</th>
     </tr>
   </thead>

   @foreach ($maintenances as $maintenance)

     <tr>
       <td>{{ $maintenance->id }}</td>
       <td>{{ $maintenance->name }}</td>
       <td>{{ $maintenance->owner_id or 'Blank' }}</td>
       <td>{{ $maintenance->owner_id->name or 'Blank' }}</td>
       <td>{{ $maintenance->price or 'Blank' }}</td>
       <td>{{ $maintenance->description or 'Blank' }}</td>

       <td>
         <a href="{{ route('maintenances.show', $product->id) }}" class="btn btn-primary">Read</a>
       </td>

       <td>
         <a href="{{ route('maintenances.edit', $product->id) }}" class="btn btn-warning">Update</a>
       </td>

       <td>
         {!! Form::open(['route' => ['maintenances.destroy', $product->id], 'method' => 'delete']) !!}
           <button class="btn btn-danger" type="submit" >Delete</button>
         {!! Form::close() !!}
       </td>
     </tr>

   @endforeach

</table>

@stop
