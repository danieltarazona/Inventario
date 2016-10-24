<table class="table table-bordered table-hover table-responsive calendar">
  <thead>
  </thead>

  <tr>
  @for ($i=8; $i < 19; $i++)
    <td>
      @if ($i < 12)
        {{ $i }} AM
      @else
        {{ $i }} PM
      @endif
    </td>
  @endfor
  </tr>

  @for ($i=8; $i < 19; $i++)
  <tr>
    @foreach ($events as $event)
      @if ($i == $event->start)
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar"
              style="width:{{ $event->end - $event->start }}0%; margin-left: {{ abs(8 - $event->start) }}0%;">
              {{ $event->start }} - {{ $event->end }}
            </div>
          </div>
      @endif
    @endforeach
  </tr>
  @endfor
