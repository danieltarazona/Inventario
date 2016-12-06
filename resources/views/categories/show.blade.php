@extends('layouts.app')

@section('content')

  <br>
  <h1><a href="categories">{{ $category->name }}</a> / {{ trans('strings.products') }}</h1>

  <hr>

  <table class="table">

    @foreach($category->product as $product)

      <div class="col-md-3">
        <div class="thumbnail">
          <div class="caption text-center">
            <a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="" style="height:100px; width:100px;"></a>
            <a href="{{ url('products/' . $product->id) }}"><h5>{{ $product->name }}</h5></a>
            <p>Available: {{ $product->stock }}</p>

            {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
            <button class="btn btn-success" type="submit">{{trans('strings.order')}}</button>
            {!! Form::close() !!}

          </div> <!-- end caption -->
        </div> <!-- end thumbnail -->
      </div> <!-- end col-md-3 -->

    @endforeach

  </table>

@stop
