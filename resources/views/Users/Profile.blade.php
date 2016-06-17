@extends('/../Layout')

@section('content')

<h1>USER {{ $user->username }}</h1>
<h2>DNI {{ $user->dni }}</h2>

<form class="" action="/users/{{ $user->id }}" method="post">
  {{ method_field('PATCH') }}

  <input type="textbox" name="first_name" value="{{ $user->first_name }}" placeholder="Name">
  <input type="textbox" name="last_name" value="{{ $user->last_name }}" placeholder="Second Name">
  <input type="textbox" name="first_lastname" value="{{ $user->first_lastname }}" placeholder="Lastname">
  <input type="textbox" name="last_lastname" value="{{ $user->last_lastname }}" placeholder="Second Lastname">
  <input type="textbox" name="email" value="{{ $user->email }}" placeholder="Email">
  <input type="textbox" name="adress" value="{{ $user->adress }}" placeholder="Adress">
  <br>
  <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
  {{ csrf_field() }}
</form>

@stop
