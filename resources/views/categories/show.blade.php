@extends('layouts.app')

@section('content')

<<<<<<< Updated upstream
<br>
<h1><a href="categories">{{ $category->name }}</a> / {{trans('strings.Products')}}</h1>
=======
<h1><a href="categories">{{ $category->name }}</a> / Products</h1>
>>>>>>> Stashed changes

<hr>

<table class="table">

@foreach($category->product as $product)

  <div class="col-md-3">
    <div class="thumbnail">
      <div class="caption text-center">
        <a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="" style="height:100px; width:100px;"></a>
        <a href="{{ url('products/' . $product->id) }}"><h5>{{ $product->name }}</h5></a>
        <p>Available: {{ $product->stock }}</p>

        @if(Auth::user()->role_id == 1)
          {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
            <input type="number" name="quantity" value="1">
            <button class="btn btn-success" type="submit">{{trans('strings.Order')}}</button>
          {!! Form::close() !!}
        @endif

      </div> <!-- end caption -->
    </div> <!-- end thumbnail -->
  </div> <!-- end col-md-3 -->

@endforeach

</table>

@stop
