@extends('layouts.app')

@section('content')

<h1>{{ $user->username }}</h1>
<h2>{{ $user->dni }}</h2>

{!! Form::open(array('route' => array('users.update', $user->id), 'method' => 'patch')) !!}

  {!! Form::label('Name') !!}
  <input type="textbox" name="first_name" value="{{ $user->first_name }}" placeholder="Name">

  {!! Form::label('Middle Name') !!}
  <input type="textbox" name="last_name" value="{{ $user->last_name }}" placeholder="Second Name">

  {!! Form::label('Lastname') !!}
  <input type="textbox" name="first_lastname" value="{{ $user->first_lastname }}" placeholder="Lastname">

  {!! Form::label('Last Lastname') !!}
  <input type="textbox" name="last_lastname" value="{{ $user->last_lastname }}" placeholder="Second Lastname">

  {!! Form::label('Email') !!}
  <input type="textbox" name="email" value="{{ $user->email }}" placeholder="Email">

  {!! Form::label('Adress') !!}
  <input type="textbox" name="adress" value="{{ $user->adress }}" placeholder="Adress">

  {!! Form::label('Telephone') !!}
  <input type="textbox" name="telephone" value="{{ $user->telephone }}" placeholder="Telephone">

  {!! Form::label('Cellphone') !!}
  <input type="textbox" name="cellphone" value="{{ $user->cellphone }}" placeholder="Cellphone">


  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, $user->city_id) !!}

  {!! Form::label('Store') !!}
  {!! Form::select('store_id', $stores, $user->store_id) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, $user->region_id) !!}

  {!! Form::label('State') !!}
  {!! Form::select('state_id', $states, $user->state_id) !!}

  <input type="submit" class="btn btn-primary" name="submit" value="Save">

{!! Form::close() !!}

@stop
