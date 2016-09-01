<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Provider;

class ProvidersController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $providers = Provider::all();
    return view('providers.index', compact('providers'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('providers.create');
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
      flash('Validation Fail!', 'error');
      return redirect('providers')
      ->withErrors($validator)
      ->withInput();
    } else {
      $provider = new Provider;
      Provider::create($request->all());
      return redirect('providers');
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
    $provider = Provider::findOrFail($id);

    return view('providers.edit', compact('provider'));
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
    $provider = Provider::findOrFail($id);

    $provider->name = $request->name;
    $provider->telephone = $request->telephone;
    $provider->adress = $request->adress;
    $provider->save();

    return redirect('providers');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Provider::findOrFail($id)->delete();

    return redirect('providers');
  }

  public function rules()
  {
    return [
      'name'    => 'required|max:255|unique:providers',
      'telephone'    => 'numeric|min:7',
      'adress'    => 'string|max:255',
    ];
  }
}
