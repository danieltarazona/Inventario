<div class="col-md-3">
  <div class="thumbnail">
    <div class="caption text-center">
      <a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="" style="height:100px; width:100px;"></a>
      <a href="{{ url('products/' . $product->id) }}"><h5>{{ $product->name }}</h5></a>
      <p>Stock: {{ $product->stock }}</p>
      <p>Available: {{ $product->stock }}</p>
      <input type="number" name="quantity" value="1">

      {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-success" type="submit">Order</button>
      {!! Form::close() !!}

    </div> <!-- end caption -->
  </div> <!-- end thumbnail -->
</div> <!-- end col-md-3 -->
