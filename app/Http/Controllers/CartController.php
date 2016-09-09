<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests;
use Validator;
use App\Product;
use App\Cart;
use Auth;

class CartController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $cart = Cart::findOrFail($id);
    return view('cart.show', compact('cart'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    flash('Item was added to your cart!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\JsonResponse
  */
  public function update(Request $request, $id)
  {
    // Validation on max quantity
    $validator = Validator::make($request->all(),$this->rules());
    if ($validator->fails()) {
      flash('Validation Fails!', 'danger');
      return response()->json(['success' => false]);
    } else {
      Cart::update($id, $request->quantity);
      flash('Quantity was updated successfully!', 'success');
      return response()->json(['success' => true]);
    }
  }

  /**
  * Add the specified product to Cart.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function add($id)
  {
    $product = Product::findOrFail($id);
    $cart = Cart::findOrFail(Auth::id());
    $cart->product()->save($product);
    flash('Item has been Added!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function remove($id)
  {
    $cart = Cart::findOrFail(Auth::id());
    $cart->product()->detach($id);
    flash('Item has been Removed!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Destroy the specified cart.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $cart = Cart::findOrFail($id);
    $cart->product()->detach();
    flash('Cart has been Clear!', 'success');
    return redirect('cart/' . Auth::id());
  }

  public function rules()
  {
    return [
      'quantity' => 'required|numeric',
    ];
  }

}
