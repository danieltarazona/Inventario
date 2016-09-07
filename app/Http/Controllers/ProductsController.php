<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Product;
use App\City;
use App\Store;
use App\Category;
use App\Provider;
use App\State;
use App\Region;
use App\Order;

use Auth;


class ProductsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products = Product::all();
    if (Auth::id() == 1)
    {
      return view('products.indexList', compact('products'));
    } else {
      return view('products.indexCard', compact('products'));
    }
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::lists('name', 'id');
    $providers = Provider::lists('name', 'id');
    $stores = Store::lists('name', 'id');
    $cities = City::lists('name', 'id');
    $states = State::lists('name', 'id');
    $regions = Region::lists('name', 'id');

    return view('products.create', compact(
    'categories', 'providers',
    'states', 'stores', 'cities', 'regions'
  ));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  $validator = Validator::make($request->all(), $this->rules());

  if ($validator->fails()) {
    flash('Create Successful!', 'success');
    return redirect('products.create')
    ->withErrors($validator)
    ->withInput();
  } else {
    $product = new App\Product;
    $product->name = $request->name;
    $product->serial = $request->serial;
    $product->warranty = $request->warranty;
    $product->stock = $request->stock;
    $product->amount = $product->stock;
    $product->year = $request->year;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->maintenance_id = $request->maintenance_id;
    $product->provider_id = $request->provider_id;
    $product->store_id = $request->store_id;
    $product->state_id = $request->state_id;
    $product->save();
    flash('Update Complete!', 'success');
    return redirect('products');
  }
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
  $product = Product::findOrFail($id);
  return view('products.show', compact('product'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
  $product = Product::findOrFail($id);
  $categories = Category::lists('name', 'id');
  $providers = Provider::lists('name', 'id');
  $stores = Store::lists('name', 'id');
  $cities = City::lists('name', 'id');
  $states = State::lists('name', 'id');
  $regions = Region::lists('name', 'id');

  return view('products.edit', compact(
  'product', 'categories', 'providers',
  'states', 'stores', 'cities', 'regions'
));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
  $product = Product::find($id);

  $validator = Validator::make($request->all(), $this->rules());
  if ($validator->fails()) {
    flash('Validation Fail!', 'error');
    return redirect('products/' . $product->id . '/edit')
      ->withErrors($validator)
      ->withInput();
  } else {
    $product->name = $request->name;
    $product->serial = $request->serial;
    $product->warranty = $request->warranty;
    $product->stock = $request->stock;
    $product->year = $request->year;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->maintenance_id = $request->maintenance_id;
    $product->provider_id = $request->provider_id;
    $product->store_id = $request->store_id;
    $product->state_id = $request->state_id;
    $product->save();
    flash('Update Complete!', 'success');
    return redirect('products');
  }
}

public function search(Request $request)
{
  return redirect('products');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  Product::findOrFail($id)->delete();
  return redirect('products');
  flash('Delete Successful!', 'success');
}

public function rules()
{
  return [
    'name'    => 'required|max:255|unique:products',
    'stock'   => 'required|numeric',
    'serial'  => 'required|max:255|unique:products',
    'year'    => 'numeric',
    'price'   => 'numeric',
    'warranty'=> 'numeric',
    'category_id' => 'required|numeric',
    'provider_id' => 'required|numeric',
    'maintenance_id' => 'required|numeric',
    'store_id' => 'required|numeric',
    'state_id' => 'required|numeric',
  ];
}

}
