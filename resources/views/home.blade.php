@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>

          <div class="panel-body">
            <section class="content">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{ $stores_count }}</h3>

                      <p>Locales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="/stores" class="small-box-footer">{{trans('strings.more_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{$repairs_count}}</h3>

                      <p>Mantenimientos</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/repairs" class="small-box-footer">{{trans('strings.more_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{$users_count}}</h3>

                      <p>Usuarios</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/users" class="small-box-footer">{{trans('strings.more_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{$products_count}}</h3>

                      <p>Productos</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/products" class="small-box-footer">{{trans('strings.more_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
