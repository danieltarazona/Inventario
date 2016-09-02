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
                                <a href="{{ url('products/' . $product->id . '/edit') }}"><h3>{{ $product->name }}</h3>
                                <p>{{ $product->price }}</p>
                                <p>
                                  {!! Form::open(['route' => ['order.update', $product->id], 'method' => 'post']) !!}
                                    <input type="text" name="quantity" value="1">
                                    <button class="btn btn-warning" type="submit" >Add to Order</button>
                                  {!! Form::close() !!}

                                  {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                                    <button class="btn btn-danger" type="submit" >Delete</button>
                                  {!! Form::close() !!}
                                </p>
                                </a>
                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                @endforeach
            </div> <!-- end row -->
        @endforeach

    </div> <!-- end container -->

@endsection
