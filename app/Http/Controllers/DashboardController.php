<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Dashboard;
use App\Log;
use App\Sales;
use App\Stores;
use App\Orders;
use App\Users;
use App\Cities;
use App\Issues;
use App\Maintenances;
use App\Products;
use App\Regions;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dashboard = Dashboard::all();

      return view('dashboard.index', compact('dashboard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $logs = Log::lists('name', 'id');
      $sales = Sale::lists('name', 'id');
      $stores = Store::lists('name', 'id');
      $orders = Order::lists('name', 'id');
      $users = User::lists('name', 'id');
      $cities = City::lists('name', 'id');
      $issues = Issue::lists('name', 'id');
      $maintenances = Maintenance::lists('name', 'id');
      $products = Product::lists('name', 'id');
      $regions = Region::lists('name', 'id');

      return view('dashboard.create', compact(
        'logs', 'sales', 'stores', 'orders', 'users',
        'cities', 'issues', 'maintenances', 'products', 'regions'
      ));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
