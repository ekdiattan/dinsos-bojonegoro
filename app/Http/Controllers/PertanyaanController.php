<?php

namespace App\Http\Controllers;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{

    public function view()
    {
        $pertanyaan = Pertanyaan::all();
        return view('admin.datapertanyaan.index', ['title' => 'Dinas Sosial Bojonegoro','pertanyaan' => $pertanyaan]);
    }

    public function tambahpertanyaanview()
    {
        return view('admin.datapertanyaan.create', ['title' => 'Dinas Sosial Bojonegoro']);
    }

    public function tambahpertanyaan(Request $request)
    {
        Pertanyaan::create($request->all());
        return redirect('/datapertanyaan')->with('success', 'Data Pertanyaan Berhasil Ditambahkan!');
    }
}
