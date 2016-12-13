@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.product')}}</h1>

  <hr>

  {!! Form::open(['route' => ['products.search'], 'method' => 'POST']) !!}

  <br>
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <input type="text" class="form-control" name="search" placeholder="{{ trans('strings.search') }}" style="width:50%">
          <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
    </div>
  <br>

  {!! Form::close() !!}

  {{ $products->links() }}

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
                <button class="btn btn-success" type="submit">{{trans('strings.add')}}</button>
              {!! Form::close() !!}

            </div> <!-- end caption -->
          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach
    </div>
  @endforeach
</div>

@endsection
