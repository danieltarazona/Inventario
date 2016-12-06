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

        <h4>{{trans('strings.category')}}: {{ $product->category->name or 'Blank' }}</h4>
        <h4>{{trans('strings.provider')}}: {{ $product->provider->username or 'Blank' }}</h4>
        <h4>{{trans('strings.store')}}: {{ $product->store->name or 'Blank' }}</h4>
        <h4>{{trans('strings.serial')}}: {{ $product->serial or 'Blank' }}</h4>
        <h4>{{trans('strings.model')}}: {{ $product->year or 'Blank' }}</h4>
        <h4>{{trans('strings.buy_date')}}: {{ $product->date or 'Blank' }}</h4>
        <h4>{{trans('strings.price')}}: {{ $product->price or 'Blank' }}</h4>
        <h4>{{trans('strings.warranty')}}: {{ $product->warranty or 'Blank' }} Months</h4>

        {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-success" type="submit" name="{{trans('strings.add')}}">{{trans('strings.add')}}</button>
        {!! Form::close() !!}

        <br>

        {!! Form::open(['route' => ['products.damage', $product->id], 'method' => 'POST']) !!}
        <button class="btn btn-danger" type="submit">{{trans('strings.damage')}}</button>
        {!! Form::close() !!}

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    </table>

    <h2>{{ trans('strings.events') }}</h2>

    <hr>

    <table class="table table-bordered table-hover table-responsive">
      <thead>
        <tr>
          <th>ID</th>
          <th>Start</th>
          <th>End</th>
          <th>Date</th>
        </tr>
      </thead>

      @foreach($product->event as $event)
        <tr>
          <td>{{ $event->id }}</td>
          <td>{{ $event->start }}</td>
          <td>{{ $event->end }}</td>
          <td>{{ $event->date }}</td>
        </tr>
      @endforeach
    </table>

  </div>
</div>

@stop
