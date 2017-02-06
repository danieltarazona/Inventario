<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;

class RolesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $roles = Role::all();
    return view('roles.index', compact('roles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('roles.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), $this->rules());
    if ($validator->fails()) {
      Flash(trans('strings.validation_fails'), 'error');
      return redirect('roles/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      Role::create($request->all());
      Flash('Create Successful!', 'success');
      return redirect('roles');
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function assign($id, Request $request)
  {
    $user_id = $request->user_id;
    $role = Role::findOrFail($id);
    $user = User::findOrFail($user_id);
    $role->user()->save($user);
    Flash('Role has been Assigned!', 'success');
    return redirect('users/' . $user_id);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $role = Role::findOrFail($id);
    return view('roles.show', compact('role'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $role = Role::findOrFail($id);
    return view('roles.edit', compact('role'));
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
    $role = Role::findOrFail($id);

    $validator = Validator::make($request->all(), $this->rules());
    if ($validator->fails()) {
      Flash(trans('strings.validation_fails'), 'error');
      return redirect('roles/' . $id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      $input = $request->all();
      $role->fill($input)->saveOrFail();
      Flash('Update Successful!', 'success');
      return redirect('roles');
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Role::findOrFail($id)->delete();
    Flash('Role has been Removed!', 'success');
    return redirect('roles');
  }

  public function rules()
  {
    return [
      'name' => 'required|max:255|unique:roles',
    ];
  }
}
