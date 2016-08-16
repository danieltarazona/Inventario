<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('home');
  }

  public function welcome()
  {
    return view('welcome');
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
