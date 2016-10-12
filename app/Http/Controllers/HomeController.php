<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Dashboard;
use App\Cart;
use App\Sale;
use App\Store;
use App\Order;
use App\User;
use App\City;
use App\Issue;
use App\Maintenance;
use App\Product;
use App\Region;

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
      $carts = Cart::all();
      $stores = Store::all()->orderBy('name');
      $cities = City::all()->orderBy('name');
      $issues = Issue::all()->orderBy('name');
      $maintenances = Maintenance::all()->orderBy('name');
      $products = Product::all()->orderBy('name')->with('category');
      $regions = Region::all()->orderBy('name');
      $users = User::all()->orderBy('username');
      $states = State::all()->orderBy('id');

      return view('welcome', compact(
        'stores', 'cities', 'issues', 'maintenances', 'products',
        'regions', 'users', 'states'
      ));
    }

    public function index()
    {
        return view('home');
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
