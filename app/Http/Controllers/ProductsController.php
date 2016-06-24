<?php

namespace App\Http\Controllers;

use App\Product;
use App\City;
use App\Store;
use App\Category;
use App\Manufacturer;
use App\State;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
        $manufacturers = Manufacturer::lists('name', 'id');
        $stores = Store::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $states = State::lists('name', 'id');

        return view('products.create', compact(
            'categories', 'manufacturers',
            'states', 'stores', 'cities'
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
           return redirect('products/create')
               ->withErrors($validator)
               ->withInput();
        } else {
            $product = new Product;
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->serial = $request->serial;
            $product->year = $request->year;
            $product->price = $request->price;
            $product->warranty = $request->warranty;
            $product->buy = $request->buy;
            $product->city_id = $request->city_id;
            $product->store_id = $request->store_id;
            $product->state_id = $request->state_id;
            $product->category_id = $request->category_id;
            $product->manufacturer_id = $request->manufacturer_id;
            $product->save();

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
        $manufacturers = Manufacturer::lists('name', 'id');
        $stores = Store::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $states = State::lists('name', 'id');

        return view('products.edit', compact(
            'product', 'categories', 'manufacturers',
            'states', 'stores', 'cities'
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
        $product->stock = $request->stock;
        $product->serial = $request->serial;
        $product->year = $request->year;
        $product->price = $request->price;
        $product->warranty = $request->warranty;
        $product->buy = $request->buy;
        $product->city_id = $request->city_id;
        $product->store_id = $request->store_id;
        $product->state_id = $request->state_id;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
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
          'buy'     => 'required|date',
        ];
    }

}
