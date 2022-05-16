<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


  public function index() {

    return view('categories', [

      "title" => "Kategori",
      "categories" => Category::all(),

    ]);

  }

  // show all information on category
  // route model binding
  public function show(Category $category)
  {

    return view('category', [
      "title" => $category->name,
      "events" => $category->events,
      "category" => $category->name,
    ]);

  }
}
