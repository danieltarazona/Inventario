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
      $stores = Store::all()->sortBy('name');
      $cities = City::all()->sortBy('name');
      $issues = Issue::all()->sortBy('name');
      $repairs = Repair::all();
      $products = Product::all()->load('category')->sortBy('name');
      $regions = Region::all()->sortBy('name');
      $users = User::all()->sortBy('username');
      $states = State::all()->sortBy('id');
      $events = Event::all();

      $stores_count = $stores->count();
      $cities_count = $cities->count();
      $repairs_count = $repairs->count();
      $products_count = $products->count();
      $regions_count = $regions->count();
      $users_count = $users->count();

      return view('home', compact(
        'stores', 'cities', 'issues', 'repairs', 'products',
        'regions', 'users', 'states', 'events', 'stores_count', 'cities_count',
        'repairs_count', 'products_count', 'regions_count', 'users_count'
      ));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
