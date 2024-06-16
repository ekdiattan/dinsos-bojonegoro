<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginPost(Request $request)
    {
        $credetials = [

        'email' => $request->email,
        'password' => $request->password

        ];

        if (Auth::attempt($credetials)) 
        {
            return redirect('/admin-dashboard')->with('success', 'Login successfully!');
        }

        return back()->with('error', 'Your email or password is incorrect!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function view()
    {
        return view('login', ['title' => 'Dinas Sosial Bojonegoro']);
    }
}
