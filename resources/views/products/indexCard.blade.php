@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Products')}}</h1>

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
              <a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="" style="height:100px; width:100px;"></a>
              <a href="{{ url('products/' . $product->id) }}"><h5>{{ $product->name }}</h5></a>
              <p>Available: {{ $product->stock }}</p>

              @if(Auth::user()->role_id > 1)
                {!! Form::open(['route' => ['maintenances.add', $product->id], 'method' => 'POST']) !!}
                  <input type="number" name="quantity" value="1">
                  <button class="btn btn-warning" type="submit">{{trans('strings.Maintenance')}}</button>
                {!! Form::close() !!}
              @endif

              @if(Auth::user()->role_id == 1)
                {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
                  <input type="number" name="quantity" value="1">
                  <button class="btn btn-primary" type="submit">Order</button>
                {!! Form::close() !!}
              @endif

            </div> <!-- end caption -->
          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach
    </div>
  @endforeach
</div>

@endsection
