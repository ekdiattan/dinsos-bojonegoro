<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\ProfileResponden;
use Illuminate\Validation\Rules\In;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    public function deletepertanyaan(int $id)
    {
        $pertanyaan = Pertanyaan::find($id);
        
        $nilai = Nilai::where('NilaiPertanyaanId', $pertanyaan->PertanyaanId)->get();

        foreach ($nilai as $item) 
        {
            if($item->where('NilaiPertanyaanId', $pertanyaan->PertanyaanId)->count() == 1)
            {
                ProfileResponden::where('ProfileRespondenId', $item->NilaiRespondenId)->delete();
            }

        }

        $item->delete();
        
        $pertanyaan->delete();

        return back()->with('success', 'Data Pertanyaan Has Been Deleted!');
    }
}
