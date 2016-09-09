@extends('layouts.app')

@section('content')

  <p><a href="{{ url('products') }}">Products</a> / Cart</p>

  <h1>Your Cart</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>State</th>
        <th>Stock</th>
        <th>Price</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>

    @foreach($cart->product as $product)
      <tr>
        @include('cart.list')
      @endforeach
    </tr>
  </table>

  {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'delete']) !!}
  <button class="btn btn-danger" type="submit" >Delete</button>
  {!! Form::close() !!}

@endsection

@section('extra-js')
  <script>
  (function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.quantity').on('change', function() {
      var id = $(this).attr('data-id')
      $.ajax({
        type: "PATCH",
        url: '/cart/' + id,
        data: {
          'quantity': this.value,
        },
        success: function(data) {
          window.location.href = '/cart';
        }
      });
    });
  })();
  </script>
@endsection
