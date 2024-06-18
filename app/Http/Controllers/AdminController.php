<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\ProfileResponden;

class AdminController extends Controller
{

    public function dashboard()
    {
        $nilai = Nilai::all();

        $profileResponden = ProfileResponden::latest()->paginate(5);
        
        return view('admin.dataresponden.index',['title' => 'Dinas Sosial Bojonegoro', 'profileResponden' => $profileResponden, 'nilai' => $nilai]);
    }

    public function detail($id)
    {
        $profileResponden = ProfileResponden::find($id);
        $nilai = $profileResponden->nilai;

        return view('admin.dataresponden.show', ['title' => 'Dinas Sosial Bojonegoro', 'profileResponden' => $profileResponden, 'nilais' => $nilai]);
    }
}
