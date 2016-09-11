<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Maintenance;
use App\Product;
use App\State;
use App\User;
use Editor;
use Auth;
use Carbon\Carbon;
use DB;


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
    if (Auth::user()->role_id == 2) {
      $maintenances = Maintenance::all()->where('provider_id', Auth::id())->get();
    }
    return view('maintenances.index', compact('maintenances'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $providers = User::where('role_id', 2)->lists('username', 'id');
    return view('maintenances.create', compact('providers'));
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
      flash('Validation Fails!', 'error');
      return redirect('maintenances/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $request->description = Input::get(Editor::input());
      $input = $request->all();
      $maintenance = Maintenance::create($input);
      $maintenance->state_id = 401;
      $user = User::findOrFail(Auth::id());

      $user->maintenance()->save($maintenance);
      $maintenance->save();
      flash('Create Successful!', 'success');
      return redirect('maintenances');
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
  * Complete Maintenance
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function complete($id)
  {
    $maintenance = Maintenance::findOrFail($id);
    if($maintenance->state->id == 401) {
      $state = State::findOrFail(400); # On-Maintenance
      $state->maintenance()->save($maintenance);
      flash('Maintenance Complete!', 'success');
    } else {
      flash('Maintenance cant be Completed!', 'warning');
      return redirect('maintenances/' . $id . '/edit');
    }
    return redirect('maintenances');
  }

  /**
  * Return Products of Maintenance
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function returned($id)
  {
    $maintenance = Maintenance::findOrFail($id);

    if($maintenance->state->id == 400) {
      $state = State::findOrFail(402); # On-Maintenance
      $state->maintenance()->save($maintenance);
      flash('All Products in Maintenance Returned!', 'success');
    } else {
      flash('Some products doesnt be returned yet or repaired!', 'warning');
      return redirect('maintenances/' . $id . '/edit');
    }
    return redirect('maintenances');
  }

  /**
  * Cancel a Maintenance
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function canceled($id)
  {
    $maintenance = Maintenance::findOrFail($id);

    if($maintenance->state->id == 401) {
      $state = State::findOrFail(403); # On-Maintenance
      $state->maintenance()->save($maintenance);
      flash('Maintenance has been Cancelled!', 'success');
    } else {
      flash('The maintenance cant be canceled the provider are working now!', 'warning');
      return redirect('maintenances/' . $id . '/edit');
    }
    return redirect('maintenances');
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
      flash('Validation Fails!', 'error');
      return redirect('maintenances/' . $maintenance->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      if(Auth::user()->role_id == 2)
      {
        $maintenance->description = Input::get(Editor::input());
      }
      $maintenance->name = $request->name;
      $maintenance->save();
      flash('Update Successful!', 'success');
      return redirect('maintenances/' . $id );
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

  /*
  $maintenance = App\Maintenance::find(2)

  $product = App\Product::findOrFail(10);
  $state = App\State::findOrFail(303);
  $product->state;

  $state->product()->save($product, ['quantity' => 10]);
  $state->product()->attach($product, ['quantity' => 10]);

  $state->product()->updateExistingPivot(['quantity' => 20]);
  $state->product()->detach($product);

  */
  public function add($id, $product, Request $request)
  {
    $maintenance = Maintenance::findOrFail($id);
    $product = Product::findOrFail($product);
    $state = State::findOrFail(303); # On-Maintenance
    $product->stock = $product->stock - $request->quantity;

    if ($maintenance->product->contains($product)) {

      DB::table('maintenance_product')
      ->where(['maintenance_id' => $maintenance->id, 'product_id' => $product->id])
      ->update(['quantity' => $request->quantity]);

      DB::table('product_state')
      ->where(['product_id' => $product->id, 'state_id' => $state->id])
      ->update(['quantity' => $request->quantity]);

      $state = State::findOrFail(300); # Available
      DB::table('product_state')->where(['product_id' => $product->id, 'state_id' => $state->id])
      ->update(['quantity' => $product->stock]);

      flash('Item has been updated!', 'success');
      return redirect('maintenances/' . $id . '/edit');
    }
    $state = State::findOrFail(300); # Available
    DB::table('product_state')->where(['product_id' => $product->id, 'state_id' => $state->id])
    ->update(['quantity' => $product->stock]);

    $state = State::findOrFail(303); # On-Maintenance
    $maintenance->product()->attach($product, ['quantity' => $request->quantity]);
    $state->product()->attach($product, ['quantity' => $request->quantity]);

    flash('Item has been added!', 'success');
    return redirect('maintenances/' . $id . '/edit');
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
    $state = State::findOrFail(303);
    $state->product()->detach($product);
    $maintenance->product()->detach($product);
    flash('Item has been Removed!', 'success');
    return redirect('products/' . $product->id);
  }

  public function rules()
  {
    return [
      'name'    => 'required|string|max:255',
    ];
  }
}
