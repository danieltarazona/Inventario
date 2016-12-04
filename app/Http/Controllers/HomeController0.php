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
      $stores = Store::all()->sortBy('name');
      $cities = City::all()->sortBy('name');
      $issues = Issue::all()->sortBy('name');
      $repairs = Repair::all()->sortBy('name');
      $products = Product::all()->load('category')->sortBy('name');
      $regions = Region::all()->sortBy('name');
      $users = User::all()->sortBy('username');
      $states = State::all()->sortBy('id');
      $events = Event::all();

      return view('welcome', compact(
        'stores', 'cities', 'issues', 'repairs', 'products',
        'regions', 'users', 'states', 'events'
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
