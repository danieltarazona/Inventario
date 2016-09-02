@extends('layouts.app')

@section('content')

    <div class="container">
        <p><a href="{{ url('products') }}">Products</a> / Cart</p>

        <h1>Your Cart</h1>

        <hr>
            @foreach ()

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ()
                    <tr>
                        <td class="table-image"><a href="{{ url('shop', [$item->product->name]) }}"><img src="{{ asset('img/' . $item->product->photo) }}" alt="product" class="img-responsive cart-image"></a></td>
                        <td><a href="{{ url('shop', [$item->product->name]) }}">{{ $item->name }}</a></td>
                        <td>
                            <select class="quantity" data-id="{{ $item->rowid }}">
                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('cart', [$item->rowid]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            <form action="{{ url('switchToWishlist', [$item->rowid]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">$ TOTAL</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="/products" class="btn btn-primary btn-lg">Continue Exploring</a> &nbsp;
            <a href="/order" class="btn btn-success btn-lg">Proceed to Order</a>

            <div style="float:right">
                <form action="/emptyCart" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="/shop" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

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
