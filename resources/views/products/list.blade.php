<td>{{ $product->id }}</td>
<td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
<td>{{ $product->name }}</td>
<td>{{ $product->category->name or 'Blank' }}</td>
<td>{{ $product->provider->name or 'Blank' }}</td>
<td>{{ $product->store->name or 'Blank' }}</td>
<td>{{ $product->stock or 'Blank' }}</td>
<td>{{ $product->serial or 'Blank' }}</td>
<td>{{ $product->year or 'Blank' }}</td>
<td>{{ $product->created_at->year or 'Blank' }}</td>
<td>{{ $product->price or 'Blank' }}</td>
<td>{{ $product->warranty or 'Blank' }} Months</td>


<td>
  {!! Form::open(['route' => ['products.show', $product->id], 'method' => 'POST']) !!}
    <button class="btn btn-danger" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
  {!! Form::close() !!}
</td>
<td>
  {!! Form::open(['route' => ['products.edit', $product->id], 'method' => 'POST']) !!}
    <button class="btn btn-danger" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
  {!! Form::close() !!}
</td>
<td>
  {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
  {!! Form::close() !!}
</td>
