<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index', [
      "title" => "Registrasi akun",
      "active" => "registrasi"
    ]);
  }


  public function store(Request $request)
  {

    $validated = Validator::make($request->all(), [
      'name' => 'required|max:255',
      // unique itu berarti gaboleh sama di tabel tertentu, disini tabel user
      'username' => ['required', 'min:3', 'max:255', 'unique:users'],
      'email' => 'required|email:rfc,dns|unique:users',
      'password' => 'required|min:5|max:255'
    ])->validate();


    // store
    User::create($validated);
  
    // dd($validated);

  }
}
