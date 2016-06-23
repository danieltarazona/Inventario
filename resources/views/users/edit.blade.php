@extends('layouts.app')

@section('content')



<h1>{{ $user->username }}</h1>
<h2>{{ $user->dni }}</h2>

{!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'post')) !!}

  <input name="_method" type="hidden" value="PATCH">
  <input type="textbox" name="first_name" value="{{ $user->first_name }}" placeholder="Name">
  <input type="textbox" name="last_name" value="{{ $user->last_name }}" placeholder="Second Name">
  <input type="textbox" name="first_lastname" value="{{ $user->first_lastname }}" placeholder="Lastname">
  <input type="textbox" name="last_lastname" value="{{ $user->last_lastname }}" placeholder="Second Lastname">
  <input type="textbox" name="email" value="{{ $user->email }}" placeholder="Email">
  <input type="textbox" name="adress" value="{{ $user->adress }}" placeholder="Adress">
  <input type="textbox" name="telephone" value="{{ $user->telephone }}" placeholder="Telephone">
  <input type="textbox" name="cellphone" value="{{ $user->cellphone }}" placeholder="Cellphone">
  <input type="submit" class="btn btn-primary" name="submit" value="Save">

{!! Form::close() !!}

@stop
