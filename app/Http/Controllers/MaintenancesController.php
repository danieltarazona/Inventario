<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Maintenance;
use App\Product;
use App\State;
use Auth;
use Carbon\Carbon;


class MaintenancesController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $maintenances = Maintenance::all();
    return view('maintenances.index', compact('maintenances'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $products = Product::lists('name', 'id');

    return view('maintenances.create', compact('products'));
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
      return redirect('maintenances/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $maintenance = new Maintenance;
      $maintenance->name = $request->name;
      $maintenance->state_id = 7; # Waiting
      $maintenance->description = $request->description;
      $maintenance->user()->save(Auth::user());
      $maintenance->save();

      $maintenance->products()->sync($request->products_id);

      return redirect('maintenances');

      flash('Create Successful!', 'success');
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
    $maintenance = Maintenance::findOrFail($id);

    return view('maintenances.show', compact('maintenance'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $maintenance = Maintenance::findOrFail($id);
    $products = Product::lists('name', 'id');

    return view('maintenances.edit', compact('maintenance', 'products'));
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
    $maintenance = Maintenance::findOrFail($id);
    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      flash('Create Successful!', 'success');
      return redirect('maintenances/' . $maintenance->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      $input = $request->all();
      $maintenance->fill($input)->save();
      $maintenance->save();
      $maintenance->product()->sync($request->product_id);

      return redirect('maintenances');
      flash('Create Successful!', 'success');
    }
  }

  public function destroy($id)
  {
    Maintenance::findOrFail($id)->delete();
    flash('Create Successful!', 'success');
    return redirect('maintenances');
  }

  /**
  * Add the specified product to maintenance.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function add($id, $product, $quantity)
  {
    $maintenance = Maintenance::where('state_id', '6')->get();
    $product = Product::findOrFail($product);
    $state = State::findOrFail(4);
    $product->state()->save($state, ['quantity' => $quantity]);
    $maintenace->product()->save($product);
    flash('Item has been Added!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Remove the specified resource from maintenance.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function remove($id, $product)
  {
    $maintenance = Maintenance::findOrFail($id);
    $product = Product::findOrFail($product);
    $maintenance->product()->detach($product);
    flash('Item has been Removed!', 'success');
    return redirect('maintenances/' . $maintenance->id . '/edit');
  }

  public function rules()
  {
    return [
      'name'    => 'required|string|max:255',
      'description'=> 'required',
      'product_id' => 'required',
    ];
  }
}
