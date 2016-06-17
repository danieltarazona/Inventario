@extends('/../Layout')

@section('content')

<form class="" action="/users/{{ $user->id }}" method="post">
  {{ method_field('PATCH') }}
  <input type="textbox" name="name" value="{{ $user->name }}" placeholder="Name">
  <input type="textbox" name="email" value="{{ $user->email }}" placeholder="Email">
  <input type="textbox" name="password" value="{{ $user->password }}" placeholder="Password">
  <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@stop
