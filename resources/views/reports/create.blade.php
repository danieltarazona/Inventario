@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}}</h1>

  <hr>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
          <section class="content">
            <!-- Small boxes (Stat box) -->

            @foreach ($types as $type)
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{$type->name}}</h3>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/report/users" class="small-box-footer">{{trans('strings.generate')}} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            @endforeach

          </section>
        </div>
      @stop
