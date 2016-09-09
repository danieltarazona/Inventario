@extends('layouts.app')

@section('content')

  <div class="container">

    <p><a href="/categories">{{ $product->category->name or Blank }}</a> / {{ $product->name }}</p>
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->store->name or Blank }}</h2>

    <hr>

    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset($product->photo) }}" alt="product" class="img-responsive">
      </div>

      <div class="col-md-8">
        <h3>${{ $product->price }}</h3>
        <form action="/cart" method="POST" class="side-by-side">
          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <h5>Provider: {{ $product->provider->name or 'Blank' }}</h5>
          <h5>Stock: {{ $product->stock }}</h5>
          <h5>State: {{ $product->state->name or 'Blank' }}</h5>
          <h5>Serial: {{ $product->serial or 'Blank' }}</h5>
          <h5>Model: {{ $product->year or 'Blank' }}</h5>
          <h5>Buy Date: {{ $product->buy or 'Blank' }}</h5>
          <h5>Price: {{ $product->price or 'Blank' }}</h5>
          <h5>Warranty: {{ $product->warranty or 'Blank' }} Months</h5>
          <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
        </form>

        <br><br>

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    <div class="spacer"></div>

    <div class="row">
      <h3>You may also like...</h3>

      @foreach ($products as $product)
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="caption text-center">
              <a href=""><img src="{{ asset($product->photo) }}" alt="" class="img-responsive"></a>
              <a href=""><h3>{{ $product->name }}</h3>
                <p>{{ $product->price }}</p>
              </a>
            </div> <!-- end caption -->

          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach

      <br>

      <h1>Product Maintenances</h1>

      <table class="table">

        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
          </tr>
        </thead>

        @foreach($product->maintenance as $maintenance)
          <tr>
            <td>{{ $maintenance->id }}</td>
            <td>{{ $maintenance->name }}</td>
          </tr>
        @endforeach

      </table>
    </div>
  </div>

@endsection
