<td>{{ $product->id }}</td>
<td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
<td>{{ $product->name }}</td>
<td>{{ $product->state->name or 'Blank' }}</td>
<td>{{ $product->stock or 'Blank' }}</td>
<td>{{ $product->price or 'Blank' }}</td>
<td>
  <a href="{{ route('products.show', $product->id) }}" id="Create" class="btn btn-primary">Show</a>
</td>
<td>
  {!! Form::open(['route' => ['cart.remove', $product->id], 'method' => 'delete']) !!}
  <button class="btn btn-danger" type="submit" >Delete</button>
  {!! Form::close() !!}
</td>
