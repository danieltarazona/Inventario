<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\State;

class StatesController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $states = State::all();

    return view('states.index', compact('states'));
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
      return redirect('states')
      ->withErrors($validator)
      ->withInput();
    } else {
      $state = new State;
      $state->name = $request->name;
      $state->save();

      return redirect('states');
    }
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $state = State::findOrFail($id);

    return view('states.edit', compact('state'));
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
    $state = State::findOrFail($id);

    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      return redirect('states.edit', compact('state'))
      ->withErrors($validator)
      ->withInput();
    } else {
      $state->name = $request->name;
      $state->save();

      return redirect('states');
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
    State::findOrFail($id)->delete();
    return redirect('states');
  }

  public function rules()
  {
    return [
      'name' => 'string|required|max:255|unique:states',
    ];
  }
}
