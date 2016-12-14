<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Notifications\ReturnSaleNotification as ReturnNotification;

use App\Http\Requests;

use App\Sale;
use App\Product;
use App\Order;
use App\User;
use App\State;
use App\Cart;
use Carbon\Carbon;
use Auth;

class SalesController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $sales = Sale::paginate(10);
    return view('sales.index', compact('sales'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $sale = Sale::findOrFail($id);
    return view('sales.show', compact('sale'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function complete($id)
  {
    $state = State::findOrFail(400);
    $sale = Sale::findOrFail($id);
    $state->sale()->save($sale);
    $sale->in = Carbon::now(-5)->toTimeString();
    $sale->saveOrFail();

    foreach ($sale->product as $product) {
      $product->update(['state_id' => 300]);
    }

    Flash('Sale has been Complete!', 'success');
    Auth::user()->notify(new ReturnNotification($sale));
    return redirect('sales');
  }

  /**
  * Process datatables ajax request.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function search(Request $request)
  {
    $sales = Sale::search($request->search)->paginate(10);
    if ($sales->count() > 0) {
      Flash($sales->count() . ' Registers Found!', 'success');
    } else {
      Flash('No Registers Found!', 'danger');
    }
    return view('sales.index', compact('sales'));
  }

}
