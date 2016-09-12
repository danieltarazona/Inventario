<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\City;
use App\Region;


class CitiesController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $cities = City::all();
    $regions = Region::lists('name', 'id');
    return view('cities.index', compact('cities', 'regions'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $regions = Region::lists('name', 'id');
    return view('cities.create', compact('regions'));
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
      return redirect('cities')
        ->withErrors($validator)
        ->withInput();
    } else {
      City::create($request->all());
      flash('Create Successful!', 'success');
      return redirect('cities');
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
    $city = City::findOrFail($id);
    $regions = Region::lists('name', 'id');
    return view('cities.edit', compact('city', 'regions'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $city = City::findOrFail($id);
    return view('cities.show', compact('city'));
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
    $city = City::findOrFail($id);

    $validator = Validator::make($request->all(), $this->rules());
    if ($validator->fails()) {
      flash('Validation Fail!', 'danger');
      return redirect('cities/' . $city->id . '/edit')
      ->withErrors($validator)
      ->withInput();
    } else {
      $input = $request->all();
      $city->fill($input)->save();
      flash('Update Successful!', 'success');
      return redirect('cities');
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
    City::findOrFail($id)->delete();
    return redirect('cities');
  }

  public function rules()
  {
    return [
      'name' => 'string|required|max:255',
      'region_id' => 'required|numeric',
    ];
  }
}
