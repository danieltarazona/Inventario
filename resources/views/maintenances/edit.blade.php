@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Edit')}}</h1>

  {!! Form::open(array('route' => array('maintenances.update', $maintenance->id), 'method' => 'PATCH')) !!}

  {!! Form::label('name', trans('strings.Name')) !!}
  {!! Form::text('name', $maintenance->name, ['class' => 'form-control']) !!}
  @if(Auth::user()->role_id == 2)
    {!! Form::label('Description', trans(strings.Description)) !!}
    {!! Editor::view($maintenance->description) !!}
  @endif
  
  <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></button>
  {!! Form::close() !!}

  @if(Auth::user()->role_id == 2)
  {!! Form::open(['route' => ['maintenances.complete', $maintenance->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{trans('strings.Complete')}}</button>
  {!! Form::close() !!}
  @endif

  @if(Auth::user()->role_id == 3)
  {!! Form::open(['route' => ['maintenances.returned', $maintenance->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{trans('strings.Returned')}}</button>
  {!! Form::close() !!}
  @endif

  @if(Auth::user()->role_id == 4)
  {!! Form::open(['route' => ['maintenances.canceled', $maintenance->id], 'method' => 'POST']) !!}
  <button class="btn btn-success" type="submit">{{trans('strings.Cancel')}}</button>
  {!! Form::close() !!}
  @endif

  <br>
  <h1>{{trans('strings.ProdMaint')}}</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th></th>
        <th>{{trans('strings.Product')}}</th>
        <th>{{trans('strings.Category')}}</th>
        <th>{{trans('strings.Provider')}}</th>
        <th>{{trans('strings.Store')}}</th>
        <th>{{trans('strings.Serial')}}</th>
        <th>{{trans('strings.Warranty')}}</th>
        <th>{{trans('strings.Quantity')}}</th>
      </tr>
    </thead>

    @foreach($maintenance->product as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
        <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name or 'Blank' }}</td>
        <td>{{ $product->provider->name or 'Blank' }}</td>
        <td>{{ $product->store->name or 'Blank' }}</td>
        <td>{{ $product->serial or 'Blank' }}</td>
        <td>{{ $product->warranty or 'Blank' }} Months</td>
        <td>{{ $product->pivot->quantity or 'Blank' }}</td>

        @if(Auth::user()->role_id > 2)
          <td>
            {!! Form::open(['route' => ['maintenances.remove', $maintenance->id, $product->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
            {!! Form::close() !!}
          </td>
        @endif
      </tr>
    @endforeach

    {!! Form::close() !!}

  @stop
