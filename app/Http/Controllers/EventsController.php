<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;
use App\Cart;
use App\Order;
use Carbon\Carbon;
use Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::all();
      return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $start = Carbon::now(-5)->subDay();
      $end = Carbon::now(-4)->subDay();
      $date = Carbon::now()->subDay();
      $date_search = Carbon::now()->subDay();
      $cart = Cart::findOrFail(Auth::id());
      $events = Event::whereIn('product_id', $cart->product_id() )->get();

      return view('events.create', compact(
        'events', 'start', 'end', 'date', 'date_search'
      ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
      $start = Carbon::now(-5)->subDay();
      $end = Carbon::now(-4)->subDay();
      $date = Carbon::now()->subDay();
      $date_search = $request->date_search;
      $cart = Cart::findOrFail(Auth::id());
      $events = Event::where([
        'date' => $date_search,
        'product_id' => $cart->product_id()
      ])->get();

      return view('events.create', compact(
        'events', 'start', 'end', 'date', 'date_search'
      ));
    }

    /**
     * Store a newly created Event and Order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cart = Cart::findOrFail(Auth::id());

      $order = Order::create([
        'user_id' => Auth::id(),
        'state_id' => 401,
        'start' => $request->start,
        'end' => $request->end,
        'date' => $request->date
      ]);

      foreach ($cart->product as $product) {
        $event = Event::create([
          'date' => $request->date,
          'start' => $request->start,
          'end' => $request->end
        ]);
        $product->event()->save($event);
        $product->order()->save($order);
      }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
