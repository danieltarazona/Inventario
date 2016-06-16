<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Requests;

class Inventories extends Controller
{
  public function Dashboard() {
    return "Inventory Dashboard";
    # $inventarios = Inventario::all();
    # return view('/Inventario/Dashboard', compact($inventarios));
  }

  public function Info() {
    return "Info";
    # return view('Info');
  }
}
