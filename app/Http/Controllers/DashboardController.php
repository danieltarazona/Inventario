<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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

  public function index()
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

    $dashboard = Dashboard::all();

    return view('dashboard.index', compact('dashboard'));
  }

  public function edit()
  {
    return view('dashboard.edit');
  }

}
