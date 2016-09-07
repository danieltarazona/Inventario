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
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="caption text-center">
              <a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="" style="height:150px; width:150px;"></a>
              <a href="{{ url('products/' . $product->id) }}"><h5>{{ $product->name }}</h5></a>
              <p>Avalaible: {{ $product->amount }}</p>
              <p>
                <input type="number" name="quantity" value="1">

                {!! Form::open(['route' => ['cart.store', $product->id], 'method' => 'patch']) !!}
                <button class="btn btn-warning" type="submit" >Add to Order</button>
                {!! Form::close() !!}
              </p>

            </div> <!-- end caption -->
          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach
    </div> <!-- end row -->
  @endforeach

</div> <!-- end container -->

@endsection
