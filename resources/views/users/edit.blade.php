@extends('layouts.app')

@section('content')

<h1>{{ $user->username }}</h1>
<h2>{{ $user->dni }}</h2>

{!! Form::open(array('route' => array('users.update', $user->id), 'method' => 'PATCH')) !!}

  {!! Form::label(trans('strings.name')) !!}
  {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.middle_name')) !!}
  {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.lastname')) !!}
  {!! Form::text('first_lastname', $user->first_lastname, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.last_lastname')) !!}
  {!! Form::text('last_lastname', $user->last_lastname, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.email')) !!}
  {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.address')) !!}
  {!! Form::text('address', $user->adress, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.telephone')) !!}
  {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.cellphone')) !!}
  {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.store')) !!}
  {!! Form::select('store_id', $stores, $user->store_id, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.state')) !!}
  {!! Form::select('state_id', $states, $user->state_id, ['class' => 'form-control']) !!}

  <input type="submit" class="btn btn-primary" name="submit" value="Save">

{!! Form::close() !!}

@stop
