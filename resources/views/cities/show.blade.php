@extends('layouts.app')

@section('content')


  <h1>Detail City</h1>

  <h3>ID: {{ $city->id }}</h3>
  <h3>Name: {{ $city->name }}</h3>

  <h1>City Stores</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Store Name</th>
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
