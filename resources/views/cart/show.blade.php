@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.your') }} {{trans('strings.cart')}}</h1>

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

  {!! Form::open(['url' => 'orders']) !!}

    {!! Form::label('Start', trans('strings.hour_start')) !!}
    {!! Form::time('start', $start, ['class' => 'form-control']) !!}

    {!! Form::label('End', trans('strings.hour_end')) !!}
    {!! Form::time('end', $start, ['class' => 'form-control']) !!}

    {!! Form::label('Date', trans('strings.date')) !!}
    {!! Form::date('date', $day, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit(trans('strings.order'), array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

  {!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger" type="submit" >{{trans('strings.clean')}}</button>
  {!! Form::close() !!}

@endsection
