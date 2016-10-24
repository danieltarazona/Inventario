<table class="table table-bordered table-hover table-responsive calendar">
  <thead>
    <tr>
      <th>{{ trans('strings.hour') }}</th>
      <th>{{ trans('strings.monday') }}</th>
      <th>{{ trans('strings.tuesday') }}</th>
      <th>{{ trans('strings.wednesday') }}</th>
      <th>{{ trans('strings.thursday') }}</th>
      <th>{{ trans('strings.friday') }}</th>
      <th>{{ trans('strings.saturday') }}</th>
      <th>{{ trans('strings.sunday') }}</th>
    </tr>
  </thead>
    @for ($i=8; $i < 19; $i++)
      <tr>
        @if ($i < 12)
          <td>
            {{ $i }} AM
          </td>
        @else
          @if ($i == 12)
            <td>
              {{ $i }} AM
            </td>
          @else
            <td>
              {{ $i - 12 }} PM
            </td>
          @endif
        @endif
      </tr>
    @endfor
</table>
