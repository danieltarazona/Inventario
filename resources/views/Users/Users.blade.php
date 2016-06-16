@extends('/../Layout')

@section('content')

@foreach ($users as $user)

<li>
ID: {{ $user->id }}
NAME: {{ $user->name }}
EMAIL: {{ $user->email }}
</li>

@endforeach

@stop
