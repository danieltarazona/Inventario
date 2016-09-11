<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Product;
use App\Region;
use App\City;
use App\Store;
use App\Maintenance;
use App\Category;
use App\Provider;
use App\State;
use App\Order;
use App\User;

use Carbon\Carbon;
use Auth;
use File;
use DB;


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
      return view('products.indexCard', compact('products'));
    } else {
      return view('products.indexList', compact('products'));
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
    $providers = User::where('role_id', 2)->lists('username', 'id');
    $stores = Store::lists('name', 'id');
    $cities = City::lists('name', 'id');
    $regions = Region::lists('name', 'id');

    return view('products.create', compact(
    'categories', 'providers',
    'stores', 'cities', 'regions'
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
    flash('Validation Fail!', 'danger');
    return redirect('products.create')
    ->withErrors($validator)
    ->withInput();
  } else {
    $file = Input::file('photo');
    if ($file)
    {
      $filePath = public_path() . '/img/products/';
      $fileName = $file->getClientOriginalName();
      File::exists($filePath) or File::makeDirectory($filePath);
      $image = Image::make($file->getRealPath());
      $image->save($filePath . $fileName);
      $request->photo = '/img/products/' . $fileName;
    } else {
      $request->photo = '/img/products/ipad.jpeg';
    }
    $input = $request->all();
    $product = Product::create($input);
    $state = State::find(300);
    $product->state()->save($state, ['quantity' => $request->stock]);
    flash('Create Product Complete!', 'success');
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
  $maintenances = Maintenance::where('state_id', 401)->get();

  $products = Product::all()->take(4);
  return view('products.show', compact('product', 'maintenances'));
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
  $providers = User::where('role_id', 2)->lists('username', 'id');
  $stores = Store::lists('name', 'id');
  $cities = City::lists('name', 'id');
  $regions = Region::lists('name', 'id');

  return view('products.edit', compact(
  'product', 'categories', 'providers',
  'stores', 'cities', 'regions'
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
    flash('Validation Fail!', 'danger');
    return redirect('products/' . $product->id . '/edit')
      ->withErrors($validator)
      ->withInput();
  } else {
    $input = $request->all();
    $product->fill($input)->save();

    $state = State::findOrFail(300); # Available
    DB::table('product_state')->where(['product_id' => $product->id, 'state_id' => $state->id])
    ->update(['quantity' => $product->stock]);

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
    'name'    => 'required|max:255',
    'stock'   => 'required|numeric',
    'serial'  => 'required|max:255',
    'year'    => 'numeric',
    'price'   => 'numeric',
    'warranty'=> 'numeric',
    'category_id' => 'required|numeric',
    'provider_id' => 'required|numeric',
    'city_id' => 'required|numeric',
    'region_id' => 'required|numeric',
    'store_id' => 'required|numeric',
  ];
}

}
