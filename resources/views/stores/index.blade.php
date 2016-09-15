@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Stores')}}</h1>

  <br>

  <a href="{{ route('stores.create') }}" class="btn btn-primary">{{trans('strings.Create')}}</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.Name')}}</th>
        <th>{{trans('strings.Region')}}</th>
        <th>{{trans('strings.City')}}</th>
        <th>{{trans('strings.Telephone')}}</th>
        <th>{{trans('strings.Adress')}}</th>
        <th colspan="3">{{trans('strings.Actions')}}</th>
      </tr>
    </thead>

    @foreach ($stores as $store)

      <tr>
        <td>{{ $store->id }}</td>
        <td>{{ $store->name }}</td>
        <td>{{ $store->region->name or 'Blank' }}</td>
        <td>{{ $store->city->name or 'Blank' }}</td>
        <td>{{ $store->telephone or 'Blank' }}</td>
        <td>{{ $store->adress or 'Blank' }}</td>

        <td>
          <a href="{{ route('stores.show', $store->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>

        <td>
          <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        <td>
          {!! Form::open(['route' => ['stores.destroy', $store->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>

      </tr>

    @endforeach

  </table>

@stop
