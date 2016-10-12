<table class="table table-bordered table-hover table-responsive calendar">
  <thead>
    <tr>
      <th>{{ trans('strings.hour') }}</th>
      <th>{{ trans('strings.day') }}</th>
    </tr>
  </thead>
    @for ($i=8; $i < 19; $i++)
      <tr>
        <td>
          @if ($i < 12)
            {{ $i }} AM
          @else
            {{ $i }} PM
          @endif
        </td>
      </tr>
    @endfor
</table>
