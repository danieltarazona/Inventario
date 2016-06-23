@extends('layouts.app')

@section('content')

<h1>Profile</h1>

<h3>Status {{ $user->state }}</h3>
<h2>Username {{ $user->username }}</h2>
<h3>DNI {{ $user->dni }}</h3>
<h3>First Name {{ $user->first_name }}</h3>
<h3>Second Name {{ $user->first_name }}</h3>
<h3>First Lastname {{ $user->first_name }}</h3>
<h3>Last Lastname {{ $user->first_name }}</h3>
<h3>Adress {{ $user->adress }}</h3>
<h3>Cellphone {{ $user->cellphone }}</h3>
<h3>Telephone {{ $user->telephone }}</h3>
<h3>Email {{ $user->email }}</h3>

@stop
