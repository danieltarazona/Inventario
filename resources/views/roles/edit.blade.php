@extends('layouts.app')

@section('content')

<h1>{{trans('strings.Edit')}}</h1>

{!! Form::open(array('route' => array('roles.update', $role->id), 'method' => 'PATCH')) !!}
  {!! Form::label('Name', trans('strings.Name')) !!}
  {!! Form::text('name', $role->name, ['class' => 'form-control']) !!}
  <button class="btn btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></button>
{!! Form::close() !!}

<h1>{{trans('strings.Assign')}}</h1>

{!! Form::open(array('route' => array('roles.assign', $role->id), 'method' => 'POST')) !!}
{!! Form::label('User ID', trans('strings.UserID')) !!}
  <input type="number" name="user_id" value="1">
  <button class="btn btn-success" type="submit">{{trans('strings.Assign')}}</button>
{!! Form::close() !!}

@stop
