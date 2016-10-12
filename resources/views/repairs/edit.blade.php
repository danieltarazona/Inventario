@extends('layouts.app')

@section('content')

  <h1>{{ trans('strings.edit') }}</h1>

  {!! Form::open(array('route' => array('repairs.update', $repair->id), 'method' => 'PATCH')) !!}

  {!! Form::label('name', {{ trans('strings.name')) }} !!}
  {!! Form::text('name', $repair->name, ['class' => 'form-control']) !!}
  @if(Auth::user()->role_id == 2)
    {!! Form::label('Description', {{ trans('strings.description') }} ) !!}
    {!! Editor::view($repair->description) !!}
  @endif

  <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></button>
  {!! Form::close() !!}

  @if(Auth::user()->role_id == 2)
  {!! Form::open(['route' => ['repairs.complete', $repair->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{ trans('strings.complete') }}</button>
  {!! Form::close() !!}
  @endif

  @if(Auth::user()->role_id == 3)
  {!! Form::open(['route' => ['repairs.returned', $repair->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{trans('strings.returned')}}</button>
  {!! Form::close() !!}
  @endif

  @if(Auth::user()->role_id == 4)
  {!! Form::open(['route' => ['repairs.canceled', $repair->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{trans('strings.cancel')}}</button>
  {!! Form::close() !!}
  @endif

  <br>
  <h1>{{trans('strings.product_repair')}}</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th>{{trans('strings.product')}}</th>
        <th>{{trans('strings.category')}}</th>
        <th>{{trans('strings.provider')}}</th>
        <th>{{trans('strings.store')}}</th>
        <th>{{trans('strings.serial')}}</th>
        <th>{{trans('strings.warranty')}}</th>
      </tr>
    </thead>

    @foreach($repair->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>

        @if(Auth::user()->role_id > 2)
          <td>
            {!! Form::open(['route' => ['repairs.remove', $repair->id, $product->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
            {!! Form::close() !!}
          </td>
        @endif
      </tr>
    @endforeach

    {!! Form::close() !!}

  @stop
