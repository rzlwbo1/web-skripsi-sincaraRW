<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login.index', [
      "title" => 'Masuk akun',
      "active" => 'login'
    ]);
  }

  /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email:dns'],
      'password' => ['required'],
    ]);

    // dd($credentials);

    // kalo bener di cek pake auth dan redirect pake intended (middleware)
    if(Auth::attempt($credentials)) {

      $request->session()->regenerate();

      return redirect()->intended('dashboard');
    }

    // gak pake ->withErrors(), tar error nya keganti yg defult nya
    return back()->with('loginErr', "Oops email atau password anda salah!");

  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }

}
