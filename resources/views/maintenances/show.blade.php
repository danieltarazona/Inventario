@extends('layouts.app')

@section('content')

<h1>Profile</h1>

<h3>Username {{ $user->username }}</h3>
<h3>ID {{ $user->dni }}</h3>
<h3>State {{ $user->state_id->name or 'Blank' }}</h3>
<h3>City {{ $user->city_id->name or 'Blank' }}</h3>
<h3>Career {{ $user->program_id->name or 'Blank' }}</h3>
<h3>store {{ $user->store_id->name or 'Blank' }}</h3>
<h3>First Name {{ $user->first_name or 'Blank' }}</h3>
<h3>Second Name {{ $user->last_name or 'Blank' }}</h3>
<h3>First Lastname {{ $user->first_lastname or 'Blank' }}</h3>
<h3>Last Lastname {{ $user->last_lastname or 'Blank' }}</h3>
<h3>Adress {{ $user->adress or 'Blank' }}</h3>
<h3>Cellphone {{ $user->cellphone or 'Blank' }}</h3>
<h3>Telephone {{ $user->telephone or 'Blank' }}</h3>
<h3>Email {{ $user->email }}</h3>

@stop
