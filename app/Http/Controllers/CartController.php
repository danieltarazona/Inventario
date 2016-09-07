<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Cart;

class CartController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('cart.index');
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
    Cart::associate('product', 'cart')->add($request->id, $request->name, 1, $request->price);
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
    $validator = Validator::make($request->all(), [
      'quantity' => 'required|numeric|between:1,5'
    ]);
    if ($validator->fails()) {
      flash('Quantity must be between 1 and 5.', 'error');
      return response()->json(['success' => false]);
    }
    Cart::update($id, $request->quantity);
    flash('Quantity was updated successfully!', 'success');
    return response()->json(['success' => true]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Cart::remove($id);
    flash('Item has been removed!', 'success');
    return redirect('cart');
  }

  /**
  * Remove the resource from storage.
  *
  * @return \Illuminate\Http\Response
  */
  public function emptyCart()
  {
    Cart::destroy();
    flash('Your cart his been cleared!', 'success');
    return redirect('cart');
  }

}
