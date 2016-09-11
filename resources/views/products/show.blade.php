@extends('layouts.app')

@section('content')

  <div class="container">

    <p><a href="/categories">{{ $product->category->name or 'Blank' }}</a> / {{ $product->name }}</p>
    <h1>{{ $product->name or 'Blank' }}</h1>
    <h2>{{ $product->store->name or 'Blank' }}</h2>

    <hr>

    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset($product->photo) }}" alt="product" class="img-responsive">
      </div>

      <div class="col-md-8">
        <h3>${{ $product->price }}</h3>

        <input type="hidden" name="id" value="{{ $product->id or 'Blank' }}">
        <input type="hidden" name="name" value="{{ $product->name or 'Blank' }}">
        <input type="hidden" name="price" value="{{ $product->price or 'Blank' }}">

        <h5>Provider: {{ $product->provider->name or 'Blank' }}</h5>
        <h5>Stock: {{ $product->stock or 'Blank' }}</h5>
        <h5>State: {{ $product->state->name or 'Blank' }}</h5>
        <h5>Serial: {{ $product->serial or 'Blank' }}</h5>
        <h5>Model: {{ $product->year or 'Blank' }}</h5>
        <h5>Buy Date: {{ $product->buy or 'Blank' }}</h5>
        <h5>Price: {{ $product->price or 'Blank' }}</h5>
        <h5>Warranty: {{ $product->warranty or 'Blank' }} Months</h5>

        @if(Auth::user()->role_id == 1)
          {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
          <input type="number" name="quantity" value="1">
          <button class="btn btn-success" type="submit">Order</button>
          {!! Form::close() !!}
        @endif

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    <div class="spacer"></div>

    <div class="row">

      <h1>Product State Stats</h1>

      <table class="table">

        <thead>
          <tr>
            <th>State</th>
            <th>Quantity</th>
          </tr>
        </thead>

        @foreach($product->state as $state)
          <tr>
            @if($state->name == 'Available')
              <td><span class="label label-success">{{ $state->name }} : {{ $product->stock }}</span></td>
            @endif

            @if($state->name == 'On-Maintenance')
              <td><span class="label label-warning">{{ $state->name }}</span></td>
            @endif

            @if($state->name == 'Damage')
              <td><span class="label label-danger">{{ $state->name }}</span></td>
            @endif

            @if($state->name == 'On-Order')
              <td><span class="label label-primary">{{ $state->name }}</span></td>
            @endif

            @if($state->name == 'On-Loan')
              <td><span class="label label-default">{{ $state->name }}</span></td>
            @endif

            <td>{{ $state->pivot->quantity }}</td>
          </tr>
        @endforeach
      </table>

      <h1>Product Repair</h1>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th colspan="4">Actions</th>
          </tr>
        </thead>

      @foreach ($product->maintenance as $maintenance)
        <tr>
          <td>{{ $maintenance->id }}</td>
          <td><a href="/maintenances/{{ $maintenance->id }}">{{ $maintenance->name }}</a></td>
          <td>{{ $maintenance->description }}</td>
          <td>
            @if(Auth::user()->role_id > 1)
              {!! Form::open(['route' => ['maintenances.add', $maintenance->id, $product->id], 'method' => 'POST']) !!}
              <input type="number" name="quantity" value="{{ $maintenance->pivot->quantity }}">
              <button class="btn btn-warning" type="submit"><i class="fa fa-life-ring" aria-hidden="true"></i> Repair</button>
              {!! Form::close() !!}
            @endif
          </td>
          <td>
            @if(Auth::user()->role_id > 1)
              {!! Form::open(['route' => ['maintenances.remove', $maintenance->id, $product->id], 'method' => 'DELETE']) !!}
              <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              {!! Form::close() !!}
            @endif
          </td>
        </tr>
      @endforeach

      </table>

      <h1>Maintenances</h1>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th colspan="4">Actions</th>
          </tr>
        </thead>

        @foreach ($maintenances as $maintenance)
          <tr>
            <td>{{ $maintenance->id }}</td>
            <td><a href="/maintenances/{{ $maintenance->id }}">{{ $maintenance->name }}</a></td>
            <td>{{ $maintenance->description }}</td>
            <td>
              @if(Auth::user()->role_id > 1)
                {!! Form::open(['route' => ['maintenances.add', $maintenance->id, $product->id], 'method' => 'POST']) !!}
                <input type="number" name="quantity" value="1">
                <button class="btn btn-warning" type="submit"><i class="fa fa-life-ring" aria-hidden="true"></i> Repair</button>
                {!! Form::close() !!}
              @endif
            </td>
            <td>
              @if(Auth::user()->role_id > 1)
                {!! Form::open(['route' => ['maintenances.remove', $maintenance->id, $product->id], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                {!! Form::close() !!}
              @endif
            </td>
          </tr>
        @endforeach

      </table>
    </div>
  </div>

@endsection
