@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.ranges')}}</h1>

  <hr>

  <div class="row">
    <div class="panel-body">

      @foreach ($ranges as $range)

        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{trans('strings.year')}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="" class="small-box-footer">{{trans('strings.generate')}} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      @endforeach

  <h3>{{trans('strings.edit')}}</h3>

  {!! Form::open(['route' => 'reports.store', 'method' => 'POST']) !!}

    {!! Form::label('Start', trans('strings.hour_start')) !!}
    {!! Form::date('start', Carbon::now(), ['class' => 'form-control']) !!}

    {!! Form::label('End', trans('strings.hour_end')) !!}
    {!! Form::date('end', Carbon::now(), ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit(trans('strings.generate'), array('class' => 'btn btn-success')) }}

  {!! Form::close() !!}

@stop
