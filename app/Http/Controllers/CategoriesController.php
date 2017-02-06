<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use App\Category;

use File;
use Auth;

class CategoriesController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::all()->sortBy("name");

    if (Auth::user()->role_id == 1)
    {
      return view('categories.indexCard', compact('categories'));
    } elseif (Auth::user()->role_id > 1) {
      return view('categories.indexList', compact('categories'));
    }
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
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
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
      Flash('Validation Fail!', 'danger');
      return redirect('categories/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $file = Input::file('photo');
      $category = new Category;
      if ($file)
      {
        $filePath = public_path() . '/img/categories/';
        $fileName = $file->getClientOriginalName();
        File::exists($filePath) or File::makeDirectory($filePath);
        $image = Image::make($file->getRealPath());
        $image->save($filePath . $fileName);
        $category->photo = '/img/categories/' . $fileName;
      } else {
        $category->photo = '/img/categories/ipad.jpeg';
      }
      $category->description = $request->description;
      $category->name = $request->name;
      $category->saveOrFail();
      Flash('Create Successful!', 'success');
    }
    return redirect('categories');
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
      Flash(trans('strings.validation_fails'), 'danger');
      return redirect('categories/' . $category->id . '/edit')
        ->withErrors($validator)
        ->withInput();
    } else {
      $request->photo = '/img/categories/category.png';
    }
    $category->photo = $request->photo;
    $category->name = $request->name;
    $category->saveOrFail();
    Flash('Update Complete!', 'success');
    return redirect('categories');
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
    Flash('Delete Complete!', 'success');
    return redirect('categories');
  }

  public function rules()
  {
    return [
      'name' => 'string|required|max:255|unique:categories',
      'photo' => 'image|optional',
      'description' => 'string|required',
    ];
  }
}
