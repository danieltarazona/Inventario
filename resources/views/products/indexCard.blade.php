@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @foreach ($products->chunk(4) as $items)
            <div class="row">
                @foreach ($items as $product)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <a href="{{ url('products/' . $product->id . '/edit') }}"><img src="{{ $product->photo }}" alt="" class="img-responsive"></a>
                                <a href="{{ url('products/' . $product->id . '/edit') }}"><h3>{{ $product->name }}</h3></a>
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
