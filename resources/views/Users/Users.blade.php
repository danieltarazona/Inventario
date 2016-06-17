@extends('/../Layout')

@section('content')

<ul class="list-group">
@foreach ($users as $user)

  <li class="list-group-item">
  NAME: {{ $user->name }}
  EMAIL: {{ $user->email }}
  <button class="btn btn-primary"><a href="/users/{{ $user->id }}">EDIT</a>
  </li></button>

@endforeach
</ul>

@stop
