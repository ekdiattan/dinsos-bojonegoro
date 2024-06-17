<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function view()
    {
        return view('layanan', ['title' => 'Dinas Sosial Bojonegoro']);
    }
}