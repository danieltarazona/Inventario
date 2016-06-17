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

  public function Dashboard() {
    return view('/Users/Register');
  }

  public function Create(Request $request) {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return back();
  }

  public function Update(Request $request, User $user) {
    $user->update($request->all());
    return redirect('users');
  }
}
