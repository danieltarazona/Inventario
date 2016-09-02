@extends('layouts.app')

@section('content')

  <p><a href="{{ url('products') }}">Products</a> / Cart</p>

  <h1>Your Cart</h1>

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
