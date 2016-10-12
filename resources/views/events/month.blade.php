<table class="table table-bordered table-hover table-responsive calendar">
  <thead>
    <tr>
      <th>{{ trans('strings.monday') }}</th>
      <th>{{ trans('strings.tuesday') }}</th>
      <th>{{ trans('strings.wednesday') }}</th>
      <th>{{ trans('strings.thursday') }}</th>
      <th>{{ trans('strings.friday') }}</th>
      <th>{{ trans('strings.saturday') }}</th>
      <th>{{ trans('strings.sunday') }}</th>
    </tr>
  </thead>
    @for ($i=0; $i < 5; $i++)
      <tr>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
        <td>
          {{ '' }}
        </td>
      </tr>
    @endfor
</table>
