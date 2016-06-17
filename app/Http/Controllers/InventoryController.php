<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Requests;

class InventoryController extends Controller
{
  public function dashboard() {
    return "Inventory Dashboard";
    # $inventarios = Inventario::all();
    # return view('/Inventario/Dashboard', compact($inventarios));
  }

}
