@extends('/../Layout')

@section('content')

<ul class="list-group">
@foreach ($users as $user)

  <li class="list-group-item">
    NAME: {{ $user->username }}
    DNI: {{ $user->dni }}
    EMAIL: {{ $user->email }}
    <a href="/users/{{ $user->id }}">EDIT</a>
  </li>

@endforeach
</ul>

@stop
