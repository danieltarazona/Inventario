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
use App\Sale;
use Auth;
use Carbon\Carbon;
use DB;

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
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  # $order = App\Order::findOrFail(29);
  # $sale = App\Sale::findOrFail(10);

  public function sale($id)
  {
    $order = Order::findOrFail($id);

    $sale = Sale::create([
      'out' => Carbon::now(-5)->toTimeString(),
      'state_id' => 401,
      'user_id' => Auth::id(),
      'order_id' => $order->id
    ]);

    $product->update(['state_id' => 302]);
    $sale->product()->save($product);

    $order->update(['state_id' => 400]);

    Flash('Order to Sale Complete!', 'success');
    return redirect('orders');
  }


  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(Request $request)
  {

    $cart = Cart::findOrFail(Auth::id());

    $order = Order::create([
      'start' => $request->start,
      'end' => $request->end,
      'date' => $request->date,
      'state_id' => 401,
      'user_id' => Auth::id()
    ]);

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
    $order = Order::findOrFail($id);
    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      Flash('Validation Fails!', 'error');
      return redirect('orders/' . $order->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      $order->date = $request->date;
      $order->start = $request->start;
      $order->end = $request->end;
      $order->save();
      Flash('Update Successful!', 'success');
      return redirect('orders');
    }
  }

  public function rules()
  {
    return [
      'date'    => 'required',
      'start'    => 'required',
      'end'    => 'required',
    ];
  }
}
