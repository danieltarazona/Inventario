<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
      $start = Carbon::now(-5)->toTimeString();
      $end = Carbon::now(-4)->toTimeString();
      $date = Carbon::now();
      $date_search = Carbon::now();
      $cart = Cart::findOrFail(Auth::id());
      $events = Event::whereIn('product_id', $cart->product_id())
        ->whereDate('date', $date)
        ->get();

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
      $date = Carbon::now();
      $date_search = $request->date_search;
      $cart = Cart::findOrFail(Auth::id());

      $events = Event::whereIn([
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
      $validator = Validator::make($request->all(), $this->rules());

      if ($validator->fails()) {
        Flash(trans('strings.validation_fails'), 'danger');
        return redirect('events/create')
        ->withErrors($validator)
        ->withInput();
      }

      $order = Order::create([
        'user_id' => Auth::id(),
        'state_id' => 401,
        'date' => $request->date,
        'start' => $request->start,
        'end' => $request->end
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
      Flash('Update Successful!', 'success');
      return redirect('orders');
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

    /**
     * Return the Validation Rules
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rules()
    {
      $five = Carbon::now()->addDays(5);

      return [
        'date'    => 'required|date|after:yesterday|before:' . $five,
        'start'    => 'required|after:08:00:00|before:18:45:00',
        'end'    => 'required|after:08:15:00|before:18:00:00',
      ];
    }
}
