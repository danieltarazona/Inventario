@extends('layouts.app')

@section('content')


  <h1>{{trans('strings.DetCity')}}</h1>

  <h3>ID: {{ $city->id }}</h3>
  <h3>{{trans('strings.Name')}}: {{ $city->name }}</h3>

  <h1>City Stores</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Name')}}</th>
      </tr>
    </thead>
    @foreach($city->store as $store)
      <tr>
        <td>{{ $store->id }}</td>
        <td>{{ $store->name }}</td>
      </tr>
    @endforeach
  </table>

@stop
