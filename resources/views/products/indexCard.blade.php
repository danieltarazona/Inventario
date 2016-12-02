@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.product')}}</h1>

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
              <p><span class="{{ $product->state->label }}">{{ $product->state->name }}</span></p>

              {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
                <button class="btn btn-primary" type="submit">{{trans('strings.order')}}</button>
              {!! Form::close() !!}

            </div> <!-- end caption -->
          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach
    </div>
  @endforeach
</div>

@endsection
