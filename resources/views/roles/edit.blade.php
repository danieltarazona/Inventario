@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

{!! Form::open(array('route' => array('roles.update', $role->id), 'method' => 'PATCH')) !!}
  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $role->name, ['class' => 'form-control']) !!}
  <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></button>
{!! Form::close() !!}

<h1>{{trans('strings.assign')}}</h1>

{!! Form::open(array('route' => array('roles.assign', $role->id), 'method' => 'POST')) !!}
{!! Form::label('User ID', trans('strings.user_id')) !!}
  <input type="number" name="user_id" value="1">
  <button class="btn btn-success" type="submit">{{trans('strings.assign')}}</button>
{!! Form::close() !!}

@stop
