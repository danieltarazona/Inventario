@extends('layouts.app')

@section('content')

  <h1>Products</h1>

  <button type="button" class="btn btn-default">
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th"></span>
    </a>
  </button>
  <button type="button" class="btn btn-default">

    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  <br>
  <hr>

  @foreach ($products->chunk(4) as $items)
    <div class="row">
      @foreach ($items as $product)
        @include('products.card')

      @endforeach
    </div>
  @endforeach
</div>

@endsection
