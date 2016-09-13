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
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $cart = Cart::findOrFail(Auth::id());
    $start = Carbon::now(-5)->toTimeString();
    $end = Carbon::now(-4)->toTimeString();
    $day = Carbon::now(-5);
    return view('orders.create', compact('start', 'end', 'day', 'cart'));
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
    $user = User::findOrFail(Auth::id());
    $order = Order::findOrFail($id);
    $state = State::findOrFail(400);
    $state->order()->save($order);

    $sale = new Sale;
    $sale->out = Carbon::now(-5)->toTimeString();
    $state = State::findOrFail(401);
    $state->sale()->save($sale);
    $order->sale()->save($sale);
    $user->sale()->save($sale);
    $sale->save();

    foreach ($order->product as $product) {
      foreach ($product->state as $state) {
        if ($state->id == 301) {

          DB::table('product_state')
          ->where(['product_id' => $product->id, 'state_id' => 301])
          ->update(['quantity' => 0]);

          $available = $product->stock + $state->quantity;

          DB::table('product_state')
          ->where(['product_id' => $product->id, 'state_id' => 300])
          ->update(['quantity' => $available]);

        }
      }
    }

    return redirect('sales');
  }


  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  # $cart = App\Cart::findOrFail(4);
  # $user = App\User::findOrFail(4);
  # $product = App\Product::findOrFail(2);
  # $order = new App\Order;
  # $user->order()->save($order);
  # $order->product()->sync($cart->product);
  # DB::table('cart_product')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);

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

    foreach ($cart->product as $product) {
      DB::table('order_product')->where(['product_id' => $product->id, 'order_id' => $order->id])
      ->update(['quantity' => $product->quantity()]);
      $state = State::findOrFail(301);

      $stock = $product->stock - $product->quantity();

      if($product->state->contains($state))
      {
        $product->setStock($stock);

        DB::table('product_state')
          ->where(['product_id' => $product->id, 'state_id' => 301])
          ->update(['quantity' => $product->quantity()]);


        DB::table('product_state')
          ->where(['product_id' => $product->id, 'state_id' => 300])
          ->update(['quantity' => $product->stock]);

      } else {

        DB::table('product_state')
          ->where(['product_id' => $product->id, 'state_id' => 300])
          ->update(['quantity' => $product->stock]);

        $state->product()->attach($product, ['quantity' => $product->quantity()]);
      }
    }
    $cart->product()->detach();
    $order->save();

    flash('Order has been Created!', 'success');
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
      flash('Validation Fails!', 'error');
      return redirect('orders/' . $order->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      $order->date = $request->date;
      $order->start = $request->start;
      $order->end = $request->end;
      $order->save();
      flash('Update Successful!', 'success');
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
