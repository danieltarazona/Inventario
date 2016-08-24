@extends('layouts.app')

@section('content')

<h1>{{ $user->username }}</h1>
<h2>{{ $user->dni }}</h2>

{!! Form::open(array('route' => array('admin.users.update', $user->id), 'method' => 'patch')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}

  {!! Form::label('Middle Name') !!}
  {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}

  {!! Form::label('Lastname') !!}
  {!! Form::text('first_firstname', $user->first_firstname, ['class' => 'form-control']) !!}

  {!! Form::label('Last Lastname') !!}
  {!! Form::text('last_lastname', $user->last_lastname, ['class' => 'form-control']) !!}

  {!! Form::label('Email') !!}
  {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

  {!! Form::label('Adress') !!}
  {!! Form::text('adress', $user->adress, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone') !!}
  {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}

  {!! Form::label('Cellphone') !!}
  {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control']) !!}


  {!! Form::label('City') !!}
  {!! Form::select('city_id', $cities, $user->city_id, ['class' => 'form-control']) !!}

  {!! Form::label('Store') !!}
  {!! Form::select('store_id', $stores, $user->store_id, ['class' => 'form-control']) !!}

  {!! Form::label('Region') !!}
  {!! Form::select('region_id', $regions, $user->region_id, ['class' => 'form-control']) !!}

  {!! Form::label('State') !!}
  {!! Form::select('state_id', $states, $user->state_id, ['class' => 'form-control']) !!}

  <input type="submit" class="btn btn-primary" name="submit" value="Save">

{!! Form::close() !!}

@stop
