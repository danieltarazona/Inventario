<td>{{ $product->id }}</td>
<td><img src="{{ $product->photo }}" alt="" style="weight:50px; height:50px;"/></td>
<td>{{ $product->name }}</td>
<td>{{ $product->category->name or 'Blank' }}</td>
<td>{{ $product->provider->name or 'Blank' }}</td>
<td>{{ $product->store->name or 'Blank' }}</td>
<td>{{ $product->stock or 'Blank' }}</td>
<td>{{ $product->serial or 'Blank' }}</td>
<td>{{ $product->created_at->year or 'Blank' }} /
{{ $product->created_at->month or 'Blank' }} /
{{ $product->created_at->day or 'Blank' }}</td>
<td>{{ $product->warranty or 'Blank' }} Months</td>
