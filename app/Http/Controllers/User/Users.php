<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class Users extends Controller
{
  public function read() {
    $users = User::all();
    return view('/users/users', compact('users'));
  }

  public function profile(User $user) {
    return view('/users/profile', compact('user'));
  }

  public function update(Request $request, User $user) {
    # $user->update($request->all());
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->first_lastname = $request->first_lastname;
    $user->last_lastname = $request->last_lastname;
    $user->email = $request->email;
    $user->adress = $request->adress;
    $user->save();

    return redirect('users');
  }
}
