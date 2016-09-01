<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use App\Category;

use File;

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
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('categories.create');
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
      return redirect('categories')
      ->withErrors($validator)
      ->withInput();
    } else {
      $file = Input::file('photo');
      $filePath = public_path() . '/img/categories/';
      $fileName = $file->getClientOriginalName();

      File::exists($filePath) or File::makeDirectory($filePath);
      $image = Image::make($file->getRealPath());
      $image->save($filePath . $fileName);

      $category = new Category;
      $category->photo = '/img/categories/' . $fileName;
      $category->description = $request->description;
      $category->name = $request->name;
      $category->save();
      flash('Create Successful!', 'success');
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
      flash('Validation Fail!', 'error');
      return redirect('categories/' . $category->id . '/edit')
        ->withErrors($validator)
        ->withInput();
    } else {
      $category->photo = $request->photo;
      $category->name = $request->name;
      $category->save();
      flash('Update Complete!', 'success');
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
    flash('Delete Complete!', 'success');
    return redirect('categories');
  }

  public function rules()
  {
    return [
      'name' => 'string|required|max:255|unique:categories',
      'description' => 'string|required',
    ];
  }
}
