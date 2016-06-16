<?php

namespace App\Http\Controllers;

class Index extends Controller
{
    public function Index()
    {
      return view('welcome');
    }

    public function About()
    {
      return view('about');
    }

    public function Users()
    {
      return view('users');
    }

}
