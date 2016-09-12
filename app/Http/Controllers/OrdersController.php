<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Order;
use App\Cart;
use App\User;
use App\State;
use Auth;
use Carbon\Carbon;

class OrdersController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $orders = Order::all();
    return view('orders.index', compact('orders'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $start = Carbon::now(-5)->toTimeString();
    $end = Carbon::now(-4)->toTimeString();
    $day = Carbon::now(-5);
    return view('orders.create', compact('start', 'end', 'day'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  # $cart = App\Cart::findOrFail(4);
  # $user = App\User::findOrFail(4);
  # $order = new App\Order;
  # $user->order()->save($order);

  public function store(Request $request)
  {
    $cart = Cart::findOrFail(Auth::id());
    $user = Auth::user();
    $state = State::findOrFail(401);
    $order = new Order;
    $order->start = $request->start;
    $order->end = $request->end;
    $order->date = $request->date;
    $state->order()->save($order);
    $user->order()->save($order);
    $order->product()->sync($cart->product);
    $order->save();
    $cart->product()->detach();
    return redirect('orders');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $order = Order::findOrFail($id);
    return view('orders.show', compact('order'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $order = Order::findOrFail($id);
    return view('orders.edit', compact('order'));
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Order::findOrFail($id)->delete();
    flash('Delete Complete!', 'success');
    return redirect('orders');
  }
}
