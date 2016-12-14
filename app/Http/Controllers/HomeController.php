<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Dashboard;
use App\Event;
use App\Cart;
use App\Sale;
use App\Store;
use App\Order;
use App\User;
use App\State;
use App\City;
use App\Issue;
use App\Repair;
use App\Product;
use App\Region;
use Carbon;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
      return view('welcome');
    }

    public function index()
    {
      $stores_count = Store::all()->count();
      $cities_count = City::all()->count();
      $repairs_count = Repair::all()->count();
      $products_count = Product::all()->count();
      $regions_count = Region::all()->count();
      $users_count = User::all()->count();
      $orders_count = Order::all()->count();
      $sales_count = Sale::all()->count();

      $users_daily = User::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count();
      $users_month = User::whereMonth('created_at', '>=', Carbon::now()->month)->count();
      $users_year = User::whereYear('created_at', '=', date('Y'))->count();
      $users_daily_average = round($users_year / 365, 2);
      $users_montly_average = round($users_year / 30, 2);
      $users_anual_average = round($users_year / 12, 2);
      $orders_daily = Order::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count();
      $orders_montly = Order::whereMonth('created_at', '>=',  Carbon::now()->month)->count();
      $orders_year = Order::whereYear('created_at', '=', date('Y'))->count();
      $repairs_daily = Repair::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count();
      $repairs_monthly = Repair::whereMonth('created_at', '>=',  Carbon::now()->month)->count();
      $repairs_year = Repair::whereYear('created_at', '=', date('Y'))->count();

      $products_orders = Product::where('state_id', 301)->count();
      $products_sales = Product::where('state_id', 302)->count();
      $products_repairs = Product::where('state_id', 303)->count();
      $products_damage = Product::where('state_id', 304)->count();

      $sales_daily = Sale::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count();
      $sales_monthly = Sale::whereMonth('created_at', '>=',  Carbon::now()->month)->count();
      $sales_year = Sale::whereYear('created_at', '=', date('Y'))->count();

      return view('home', compact(
        'stores_count',
        'cities_count',
        'issues_count',
        'repairs_count',
        'products_count',
        'regions_count',
        'users_count',
        'states_count',
        'events_count',
        'orders_count',
        'sales_count',

        'users_daily',
        'users_month',
        'users_year',
        'users_daily_average',
        'users_montly_average',
        'users_anual_average',

        'orders_daily',
        'orders_montly',
        'orders_year',
        'repairs_daily',
        'repairs_monthly',
        'repairs_year',

        'products_repairs',
        'products_damage',
        'products_orders',
        'products_sales',

        'sales_daily',
        'sales_monthly',
        'sales_year'
      ));
    }
}
