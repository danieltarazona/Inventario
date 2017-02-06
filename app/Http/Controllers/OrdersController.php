<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Notifications\CancelOrderNotification as CancelNotification;
use App\Notifications\OrderStoreNotification as StoreNotification;
use App\Notifications\SaleNotification;

use App\Http\Requests;

use App\Order;
use App\Cart;
use App\User;
use App\State;
use App\Sale;
use App\Event;
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
    $orders = Order::paginate(10);
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

    if ($order->state_id == 401) {
      $sale = Sale::create([
        'out' => Carbon::now(-5)->toTimeString(),
        'state_id' => 401,
        'user_id' => Auth::id(),
        'order_id' => $order->id,
        'date' => Carbon::now()
      ]);

      foreach ($order->product as $product) {
        $product->update(['state_id' => 302]);
        $product->sale()->save($sale);
      }

      $order->update(['state_id' => 400]);
      Flash('Order to Sale Complete!', 'success');
      Auth::user()->notify(new SaleNotification($order));
      return redirect('sales');

    } else {
      Flash('Order can`t be Sale!', 'danger');
      return redirect('orders/' . $order->id);
    }
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

    Flash('Order Store Successful', 'success');
    Auth::user()->notify(new StoreNotification($order));
    return redirect('orders');
  }

  /**
  * Process datatables ajax request.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function search(Request $request)
  {
    $orders = Order::search($request->search)->paginate(10);
    if ($orders->count() > 0) {
      Flash($orders->count() . ' Registers Found', 'success');
    } else {
      Flash('No Registers Found', 'danger');
    }
    return view('orders.index', compact('orders'));
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

    if ((Carbon::parse($order->start)->diffInHours(Carbon::now()) > 1) && ($order->state_id == 401)) {
      return view('orders.edit', compact('order'));
    } else {
      Flash('Order can`t be Edited!', 'danger');
      return redirect('orders');
    }
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
      Flash(trans('strings.validation_fails'), 'danger');
      return redirect('orders/' . $order->id . '/edit')
      ->withºs($validator)
      ->withInput();
    } else {
      $order->date = $request->date;
      $order->start = $request->start;
      $order->end = $request->end;
      $order->saveOrFail();
      Flash('Update Successful!', 'success');
      return redirect('orders');
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function cancel($id)
  {
    $order = Order::findOrFail($id);
    if ($order->state_id == 401) {
      $order->update(['state_id' => 403]);
      $event = Event::find($order->event_id);
      Flash('Order Cancel Successful!', 'success');
      Auth::user()->notify(new CancelNotification($order));
      return redirect('orders');
    } else {
      Flash('Order has not Waiting Status!', 'danger');
      return redirect('orders');
    }
  }

  public function rules()
  {
    return [
      'date'    => 'required|date',
      'start'    => 'required',
      'end'    => 'required',
    ];
  }
}
