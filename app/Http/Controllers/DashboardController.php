<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Dashboard;
use App\Sale;
use App\Store;
use App\Order;
use App\User;
use App\City;
use App\Issue;
use App\Maintenance;
use App\Product;
use App\Region;

class DashboardController extends Controller
{

  public function index()
  {
    $stores = Store::lists('name', 'id');
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
