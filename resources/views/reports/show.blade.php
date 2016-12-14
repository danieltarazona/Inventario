@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}} {{ $report->name }}</h1>

  <div class="panel panel-default">
    <div class="panel-body">
      <section class="content">
        <!-- Small boxes (Stat box) -->

        @foreach ($ranges as $range)
          <!-- Small boxes (Stat box) -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ $range->name }}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              {!! Form::open(['route' => ['reports.generate', $range->id], 'method' => 'GET']) !!}
              <button class="btn btn-success" type="submit" name="{{ trans('strings.select') }}">
                {{trans('strings.select')}}</button>
              {!! Form::close() !!}
              </div>
            </div>
          @endforeach

        </section>
      </div>
    </div>

@stop
