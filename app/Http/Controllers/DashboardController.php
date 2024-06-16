<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $time = date('H:i:s');
        
        return view('welcome', compact('year'));
    }
}
