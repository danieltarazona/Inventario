@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}}</h1>

  <hr>

      <div class="panel panel-default">
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

                    {!! Form::open(['route' => ['reports.generate',  $type->id], 'method' => 'POST']) !!}
                      <button class="btn btn-success" type="submit" name="{{ trans('strings.next') }}">
                        {{trans('strings.next')}}</button>
                    {!! Form::close() !!}

                  </div>
                </div>
            @endforeach

          </section>
        </div>
      </div>



      @stop
