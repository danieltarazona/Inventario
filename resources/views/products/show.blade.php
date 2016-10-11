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
          {{trans('strings.State')}}
          <span class="{{ $product->state->label }}">{{ $product->state->name }}</span>
        </h4>

        <h4>{{trans('strings.Provider')}}: {{ $product->provider->name or 'Blank' }}</h4>
        <h4>{{trans('strings.Serial')}}: {{ $product->serial or 'Blank' }}</h4>
        <h4>{{trans('strings.Model')}}: {{ $product->year or 'Blank' }}</h4>
        <h4>{{trans('strings.BuyDate')}}: {{ $product->create_at or 'Blank' }}</h4>
        <h4>{{trans('strings.Price')}}: {{ $product->price or 'Blank' }}</h4>
        <h4>{{trans('strings.Warranty')}}: {{ $product->warranty or 'Blank' }} Months</h4>

        {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-success" type="submit">{{trans('strings.Order')}}</button>
        {!! Form::close() !!}

        <br>

        {!! Form::open(['route' => ['products.damage', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-danger" type="submit">{{trans('strings.Damage')}}</button>
        {!! Form::close() !!}

        <br>

        {!! Form::open(['route' => ['products.returned', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-primary" type="submit">{{trans('strings.Returned')}}</button>
        {!! Form::close() !!}

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    <hr>

    <h1>{{trans('strings.Maintenances')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.Name')}}</th>
          <th>{{trans('strings.Description')}}</th>
          <th colspan="4">{{trans('strings.Actions')}}</th>
        </tr>
      </thead>

      @foreach ($maintenances as $maintenance)
        <tr>
          <td>{{ $maintenance->id }}</td>
          <td><a href="/maintenances/{{ $maintenance->id }}">{{ $maintenance->name }}</a></td>
          <td>{{ $maintenance->description }}</td>
          <td>
            {!! Form::open(['route' => ['maintenances.add', $maintenance->id, $product->id], 'method' => 'POST']) !!}
            <button class="btn btn-warning" type="submit"><i class="fa fa-life-ring" aria-hidden="true"></i> {{trans('strings.Repair')}}</button>
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </table>

    <hr>

    <h1>{{trans('strings.Orders')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.State')}}</th>
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

    <h1>{{trans('strings.Sales')}}</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{trans('strings.State')}}</th>
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
