<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


  public function index() {

    return view('categories', [

      "title" => "Kategori",
      "active" => "categories",
      "categories" => Category::all(),

    ]);

  }

  // show all information on category
  // route model binding
  public function show(Category $category)
  {

    // karna isinya mirip" dengan page events maka knpa ga pake view itu aja
    return view('sub', [
      "title" => $category->name,
      "events" => $category->events,
      "active" => "categories",
      "titleSub" => $category->name,
      'title' => 'Informasi acara by kategori',
    ]);

  }
}
