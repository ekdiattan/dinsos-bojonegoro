<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function view()
    {
        $user = User::all();
        return view('admin.user.index', ['title' => 'Dinas Sosial Bojonegoro', 'user' => $user]);
    }

    public function storeuser(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if ($user) 
        {
            return back()->with('error', 'Email already exists');
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Register successfully');
    }
}
