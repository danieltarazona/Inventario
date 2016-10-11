@extends('layouts.app')

@section('content')

  <div class="container">

    <p><a href="/categories">{{ $product->category->name or 'Blank' }}</a> / {{ $product->name }}</p>
    <h1>ID {{ $product->id or 'Blank' }}</h1>
    <h1>{{ $product->name or 'Blank' }}</h1>
    <h2>{{ $product->store->name or 'Blank' }}</h2>

    <hr>

    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset($product->photo) }}" alt="product" class="img-responsive">
      </div>

      <div class="col-md-8">

        <input type="hidden" name="id" value="{{ $product->id or 'Blank' }}">
        <input type="hidden" name="name" value="{{ $product->name or 'Blank' }}">
        <input type="hidden" name="price" value="{{ $product->price or 'Blank' }}">

        <h4>
          {{trans('strings.state')}}
          <span class="{{ $product->state->label }}">{{ $product->state->name }}</span>
        </h4>

        <h4>{{trans('strings.provider')}}: {{ $product->provider->name or 'Blank' }}</h4>
        <h4>{{trans('strings.serial')}}: {{ $product->serial or 'Blank' }}</h4>
        <h4>{{trans('strings.model')}}: {{ $product->year or 'Blank' }}</h4>
        <h4>{{trans('strings.buy_date')}}: {{ $product->create_at or 'Blank' }}</h4>
        <h4>{{trans('strings.price')}}: {{ $product->price or 'Blank' }}</h4>
        <h4>{{trans('strings.warranty')}}: {{ $product->warranty or 'Blank' }} Months</h4>

        {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-success" type="submit">{{trans('strings.order')}}</button>
        {!! Form::close() !!}

        <br>

        {!! Form::open(['route' => ['products.damage', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-danger" type="submit">{{trans('strings.damage')}}</button>
        {!! Form::close() !!}

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    <hr>

    <h1>{{trans('strings.maintenances')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.name')}}</th>
          <th>{{trans('strings.description')}}</th>
          <th colspan="4">{{trans('strings.actions')}}</th>
        </tr>
      </thead>

      @foreach ($maintenances as $maintenance)
        <tr>
          <td>{{ $maintenance->id }}</td>
          <td><a href="/maintenances/{{ $maintenance->id }}">{{ $maintenance->name }}</a></td>
          <td>{{ $maintenance->description }}</td>
          <td>
            {!! Form::open(['route' => ['maintenances.add', $maintenance->id, $product->id], 'method' => 'POST']) !!}
            <button class="btn btn-warning" type="submit"><i class="fa fa-life-ring" aria-hidden="true"></i> {{trans('strings.repair')}}</button>
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </table>

    <hr>

    <h1>{{trans('strings.orders')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.state')}}</th>
        </tr>
      </thead>

      @foreach ($product->order as $order)
        <tr>
          <td><a href="/orders/{{ $order->id }}">{{ $order->id }}</a></td>
          <td>{{ $order->state->name }}</td>
        </tr>
      @endforeach

    </table>

    <hr>

    <h1>{{trans('strings.sales')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.state')}}</th>
        </tr>
      </thead>

      @foreach ($product->sale as $sale)
        <tr>
          <td><a href="/sales/{{ $sale->id }}">{{ $sale->id }}</a></td>
          <td>{{ $sale->state->name }}</td>
        </tr>
      @endforeach

    </table>


  </div>
</div>

@endsection
