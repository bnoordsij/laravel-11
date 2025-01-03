<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function form(User $user)
    {

        return view('users.form', compact('user'));
    }

    public function save(Request $request, ?User $user = null)
    {
        dd(['request', $request->all()]);
        $user ??= new User();

        return back()->withSuccess('User updated');
    }
}
