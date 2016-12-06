@extends('layouts.app')

@section('content')

<h1>Profile User</h1>

<h3>{{trans('strings.username')}} {{ $user->username }}</h3>
<h3>ID {{ $user->dni }}</h3>
<h3>Email {{ $user->email  }}</h3>
<h3>{{trans('strings.state')}} {{ $user->state->name or 'Blank' }}</h3>
<h3>{{trans('strings.store')}} {{ $user->store->name or 'Blank' }}</h3>
<h3>{{trans('strings.first_name')}} {{ $user->first_name or 'Blank' }}</h3>
<h3>{{trans('strings.last_name')}} {{ $user->last_name or 'Blank' }}</h3>
<h3>{{trans('strings.first_lastname')}} {{ $user->first_lastname or 'Blank' }}</h3>
<h3>{{trans('strings.last_lastname')}} {{ $user->last_lastname or 'Blank' }}</h3>
<h3>{{trans('strings.address')}} {{ $user->adress or 'Blank' }}</h3>
<h3>{{trans('strings.cellphone')}} {{ $user->cellphone or 'Blank' }}</h3>
<h3>{{trans('strings.telephone')}} {{ $user->telephone or 'Blank' }}</h3>

@stop
