<?php

namespace App\Http\Controllers;

class Index extends Controller
{
    public function Welcome()
    {
      return view('Welcome');
    }

    public function About()
    {
      return view('About');
    }

    public function Contact()
    {
      return view('Contact');
    }
}
