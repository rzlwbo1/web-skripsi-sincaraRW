<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user) {

        return view('sub', [
            "events" => $user->events->load(['user', 'category']),
            "active" => "acara",
            'user' => $user->name,
            'titleSub' => $user->name,
            'title' => 'Informasi by User',
        ]);

    }
}
