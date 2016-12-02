<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Repair;
use App\Product;
use App\State;
use App\Cart;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;


class RepairsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $repairs = Repair::with('provider')->get();

    if (Auth::user()->role_id == 2) {
      $repairs = Repair::with(['provider' => function ($query) {
          $query->where('provider_id', Auth::id());
      }])->get();
    }
    return view('repairs.index', compact('repairs'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $providers = User::where('role_id', 2)->lists('username', 'id');
    return view('repairs.create', compact('providers'));
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
      Flash('Validation Fails!', 'error');
      return redirect('repairs/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $input = $request->all();
      $repair = Repair::create($input);
      $repair->provider_id = $request->provider;
      $repair->storer_id = Auth::id();
      $repair->state_id = 401;
      $repair->save();

      $cart = Cart::findOrFail(Auth::id());

      foreach ($cart->product as $product) {
        $repair->product()->save($product);
      }

      Flash('Create Successful!', 'success');
      return redirect('repairs');
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
    $repair = Repair::findOrFail($id);

    return view('repairs.show', compact('repair'));
  }

  /**
  * Complete repair
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function complete($id)
  {
    $repair = Repair::findOrFail($id);
    if($repair->state->id == 401) {
      $state = State::findOrFail(400); # On-repair
      $state->repair()->save($repair);
      Flash('repair Complete!', 'success');
    } else {
      Flash('repair cant be Completed!', 'warning');
      return redirect('repairs/' . $id . '/edit');
    }
    return redirect('repairs');
  }

  /**
  * Return Products of repair
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function returned($id)
  {
    $repair = Repair::findOrFail($id);

    if($repair->state->id == 400) {
      $state = State::findOrFail(402); # On-repair
      $state->repair()->save($repair);
      Flash('All Products in repair Returned!', 'success');
    } else {
      Flash('Some products doesnt be returned yet or repaired!', 'warning');
      return redirect('repairs/' . $id . '/edit');
    }
    return redirect('repairs');
  }

  /**
  * Cancel a repair
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function canceled($id)
  {
    $repair = Repair::findOrFail($id);

    if($repair->state->id == 401) {
      $state = State::findOrFail(403); # On-repair
      $state->repair()->save($repair);
      Flash('repair has been Cancelled!', 'success');
    } else {
      Flash('The repair cant be canceled the provider are working now!', 'warning');
      return redirect('repairs/' . $id . '/edit');
    }
    return redirect('repairs');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $repair = Repair::findOrFail($id);
    $products = Product::lists('name', 'id');

    return view('repairs.edit', compact('repair', 'products'));
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
    $repair = Repair::findOrFail($id);
    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      Flash('Validation Fails!', 'error');
      return redirect('repairs/' . $repair->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      if(Auth::user()->role_id == 2)
      {
        $repair->description = $request->description;
      }
      $repair->name = $request->name;
      $repair->save();
      Flash('Update Successful!', 'success');
      return redirect('repairs');
    }
  }



  /**
  * Add the specified product to repair.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  /*
  $repair = App\Repair::find(2)

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
    $repair = Repair::findOrFail($id);
    $product = Product::findOrFail($product);
    $state = State::findOrFail(303); # On-repair
    $product->stock = $product->stock - $request->quantity;

    Flash('Product has been added to Repair!', 'success');
    return redirect('repairs/' . $id . '/edit');
  }

  /**
  * Remove the specified resource from repair.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function remove($id, $product)
  {
    $repair = Repair::findOrFail($id);
    $product = Product::findOrFail($product);
    $state = State::findOrFail(303);
    $state->product()->detach($product);
    $repair->product()->detach($product);
    Flash('Product has been Removed from Repair!', 'success');
    return redirect('products/' . $product->id);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Repair::findOrFail($id)->delete();
    Flash('Repair has been Removed!', 'success');
    return redirect('repairs');
  }

  public function rules()
  {
    return [
      'name'    => 'required|string|max:255',
    ];
  }
}
