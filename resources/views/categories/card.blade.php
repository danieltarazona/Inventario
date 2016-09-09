<div class="col-md-3">
  <div class="thumbnail">
    <div class="caption text-center">
      <a href="{{ url('categories/' . $category->id) }}"><img src="{{ $category->photo }}" alt="" style="height:100px; width:100px;"></a>
      <a href="{{ url('categories/' . $category->id) }}"><h5>{{ $category->name }}</h5></a>
    </div> <!-- end caption -->
  </div> <!-- end thumbnail -->
</div> <!-- end col-md-3 -->
