@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.your') }} {{trans('strings.cart')}}</h1>

  {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger right" type="submit" >{{trans('strings.clean')}}</button>
  {!! Form::close() !!}

  <br>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th></th>
        <th>{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach($cart->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><a href="{{ url('products/' . $product->id) }}"><img src="{{ $product->photo }}" alt="{{ $product->name }}" style="weight:100px; height:100px;"/></a></td>
        <td><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></td>
        <td>
          {!! Form::open(['route' => ['cart.remove', $product->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>

  <a href="{{ url('/events/create') }}">
    <button class="btn btn-success" type="button" name="button">
      {{ trans('strings.order') }}
    </button>
  </a>



@endsection
