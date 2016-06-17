@extends('/../Layout')

@section('content')

Register

<form class="" action="/users/register" method="post">
  <input type="textbox" name="name" value="" placeholder="Name">
  <input type="textbox" name="email" value="" placeholder="Email">
  <input type="textbox" name="password" value="" placeholder="Password">
  <input type="submit" class="btn btn-primary" name="submit" value="Register">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@stop
