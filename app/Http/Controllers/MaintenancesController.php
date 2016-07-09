<?php

namespace App\Http\Controllers;

use Auth;
use App\Maintenance;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MaintenancesController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $maintenances = Maintenance::all();

    return view('maintenances.index', compact('maintenances'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $products = Product::lists('name', 'id');

    return view('maintenances.create', compact('products'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      return redirect('maintenances/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $maintenance = new Maintenance;
      $maintenance->name = $request->name;
      $maintenance->description = $request->description;
      $maintenance->seller_id = Auth::user()->id;
      $maintenance->save();

      $maintenance->products()->sync($request->products_id);


      return redirect('maintenances');
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $maintenance = Maintenance::findOrFail($id);

    return view('maintenances.show', compact('maintenance'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $maintenance = Maintenance::findOrFail($id);
    $products = Product::lists('name', 'id');

    return view('maintenances.edit', compact('maintenance', 'products'));
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
    $maintenance = Maintenance::findOrFail($id);
    $maintenance->name = $request->name;
    $maintenance->description = $request->description;
    $maintenance->save();

    $maintenance->products()->sync($request->products_id);

    return redirect('maintenances');
  }

  public function destroy($id)
  {
      Maintenance::findOrFail($id)->delete();
      return redirect('maintenances');
  }

  public function rules()
  {
    return [
      'name'    => 'required|max:255',
      'description'=> 'required',
      'product_id' => 'required',
    ];
  }
}
