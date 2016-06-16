<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class Users extends Controller
{
  public function Users() {
    $users = User::all();
    return view('/Users/Users', compact('users'));
  }

  public function Profile(User $user) {
    return view('/Users/Profile', compact('user'));
  }

  public function Register() {
    return "Register";
  }
}
