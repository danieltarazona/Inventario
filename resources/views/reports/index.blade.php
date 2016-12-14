@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.reports')}}</h1>

  <hr>

  <div class="panel panel-default">
    <div class="panel-body">
      <section class="content">
        <!-- Small boxes (Stat box) -->

    @foreach ($reports as $report)
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$report->name}}</h3>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>

          <a href="{{ route('reports.show', $report->id) }}" class="small-box-footer">{{trans('strings.select')}}<i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
      @endforeach

    </section>
  </div>
</div>

</table>


@stop
