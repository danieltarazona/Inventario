<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\City;
use App\Store;
use App\State;
use App\Region;

class UsersController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::paginate(15);

    return view('users.index', compact('users'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    $cities = City::pluck('name', 'id');
    $regions = Region::pluck('name', 'id');
    $stores = Store::pluck('name', 'id');
    $states = State::pluck('name', 'id');

    return view('users.edit', compact(
    'user', 'cities', 'stores', 'states', 'regions'
  ));

}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
  $user = User::FindOrFail($id);
  $input = $request->all();
  $user->fill($input)->save();
  Flash('User Update Successful!', 'success');
  return redirect('users');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  User::findOrFail($id)->delete();
  Flash('User Delete Successful!', 'success');
  return redirect('users');
  // return redirect()->route('users.index');
}
}
