<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests;
use Validator;
use App\Cart;

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
    if (Cart::search(['id' => $request->id])) {
      flash('Item is already in your cart!', 'success');
      return redirect('cart');
    }
    Cart::associate('product', 'carts')->add(
      $request->id,
      $request->name,
      $request->quantity,
      $request->price
    );
    flash('Item was added to your cart!', 'success');
    return redirect('cart');
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
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function remove($id)
  {
    $cart = App\Cart::findOrFail(Auth::id());
    $cart->forget($id);
    flash('Item has been removed!', 'success');
    return redirect('cart');
  }

  /**
  * Destroy the specified cart.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $cart = App\Cart::findOrFail(Auth::id())->delete();
    $user = App\User::findOrFail(Auth::id());
    $cart = new App\Cart;
    $user->cart()->save($cart);
    $cart->save();
    flash('Cart has been clear!', 'success');
    return redirect('cart');
  }

  public function rules()
  {
    return [
      'quantity' => 'required|numeric',
    ];
  }

}
