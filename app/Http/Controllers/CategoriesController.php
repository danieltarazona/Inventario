<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Category;

class CategoriesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::all();

    return view('categories.index', compact('categories'));
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
      return redirect('categories')
      ->withErrors($validator)
      ->withInput();
    } else {
      $category = new Category;
      $category->name = $request->name;
      $category->save();

      return redirect('categories');
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
    $category = Category::findOrFail($id);

    return view('categories.edit', compact('category'));
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
    $category = Category::findOrFail($id);

    $validator = Validator::make($request->all(), $this->rules());

    if ($validator->fails()) {
      return redirect('categories.edit', compact('category'))
      ->withErrors($validator)
      ->withInput();
    } else {
      $category->name = $request->name;
      $category->save();

      return redirect('categories');
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
    Category::findOrFail($id)->delete();
    return redirect('categories');
  }

  public function rules()
  {
    return [
      'name' => 'string|required|max:255|unique:categories',
    ];
  }
}
