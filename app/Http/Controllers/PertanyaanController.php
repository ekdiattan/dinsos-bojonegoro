<?php

namespace App\Http\Controllers;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{

    public function view()
    {
        $pertanyaan = Pertanyaan::all();
        return view('admin.datapertanyaan.index', ['title' => 'Dinas Sosial Bojonegoro','pertanyaan' => $pertanyaan]);
    }
}
