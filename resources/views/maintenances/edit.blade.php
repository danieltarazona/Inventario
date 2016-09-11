@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::model(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'PATCH')) !!}

  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', $maintenance->name, ['class' => 'form-control']) !!}

  {!! Form::label('Description') !!}
  {!! Form::textarea('description', $maintenance->description, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

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
        <th>Serial</th>
        <th>Warranty</th>
        <th>Quantity</th>
      </tr>
    </thead>

    @foreach($maintenance->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>
        <td>{{ $product->pivot->quantity or 'Blank' }}</td>

        <td>
          {!! Form::open(['route' => ['maintenances.remove', $maintenance->id, $product->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

{!! Form::close() !!}

@stop
