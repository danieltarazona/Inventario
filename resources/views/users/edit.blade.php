@extends('layouts.app')

@section('content')

<h1>{{ $user->username }}</h1>
<h2>{{ $user->dni }}</h2>

{!! Form::open(array('route' => array('users.update', $user->id), 'method' => 'PATCH')) !!}

  {!! Form::label(trans('strings.Name')) !!}
  {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.MiddleName')) !!}
  {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Lastname')) !!}
  {!! Form::text('first_lastname', $user->first_lastname, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.LastLastname')) !!}
  {!! Form::text('last_lastname', $user->last_lastname, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.E-Mail')) !!}
  {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Adress')) !!}
  {!! Form::text('adress', $user->adress, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Telephone')) !!}
  {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Cellphone')) !!}
  {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.Store')) !!}
  {!! Form::select('store_id', $stores, $user->store_id, ['class' => 'form-control']) !!}

  {!! Form::label(trans('strings.State')) !!}
  {!! Form::select('state_id', $states, $user->state_id, ['class' => 'form-control']) !!}

  <input type="submit" class="btn btn-primary" name="submit" value="Save">

{!! Form::close() !!}

@stop
