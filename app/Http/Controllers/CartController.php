<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests;
use Validator;
use App\Product;
use App\Cart;
use Auth;
use DB;

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
  public function update($id, Request $request)
  {
    $product = Product::findOrFail($id);
    $cart = Cart::findOrFail(Auth::id());

    DB::table('cart_product')->where(['cart_id' => $cart->id, 'product_id' => $product->id])
    ->update(['quantity' => $request->quantity]);

    flash('Quantity was updated successfully!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Add the specified product to cart.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function add($id, Request $request)
  {
    $product = Product::findOrFail($id);
    $cart = Cart::findOrFail(Auth::id());

    if ($cart->product->contains($product))
    {
      DB::table('cart_product')->where(['cart_id' => $cart->id, 'product_id' => $product->id])
      ->update(['quantity' => $request->quantity]);

      flash('Item cart quantity Update!', 'success');
      return redirect('cart/' . Auth::id());
    }
    $cart->product()->attach($product, ['quantity' => $request->quantity]);
    flash('Item has been Added!', 'success');
    return redirect('cart/' . Auth::id());
  }

  /**
  * Remove the specified resource from cart.
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
  * Clean all products of the cart.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $cart = Cart::findOrFail(Auth::id());
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
