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

    return view('products.index', compact('products'));
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
    flash('Create Sucessful!', 'sucess');
    return redirect('products.create')
    ->withErrors($validator)
    ->withInput();
  } else {
    Product::create($request->all());
    return redirect('products');
    flash('Create Sucessful!', 'sucess');
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
  $product = Product::findOrFail($id);
  $product->name = $request->name;
  $product->serial = $request->serial;
  $product->category_id = $request->category_id;
  $product->provider_id = $request->provider_id;

  if (Auth::user()->rol_id > 5) {
    $product->warranty = $request->warranty;
    $product->stock = $request->stock;
    $product->year = $request->year;
    $product->price = $request->price;
    $product->store_id = $request->store_id;
    $product->state_id = $request->state_id;
  }

  $product->save();

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
  flash('Create Sucessful!', 'sucess');
}

public function rules()
{
  return [
    'name'    => 'required|max:255|unique:products',
    'stock'   => 'required|numeric',
    'serial'  => 'required|max:255|unique:products',
    'year'    => 'required|numeric',
    'price'   => 'required|numeric',
    'warranty'=> 'required|numeric',
  ];
}

}
