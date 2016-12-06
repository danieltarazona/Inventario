@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ trans('strings.status_login')}}
                    Stores: {{ $stores_count }}
                    Repairs: {{$repairs_count}}
                    Products: {{$products_count}}
                    Users: {{$users_count}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
