<?php

namespace App\Http\Controllers;

use App\Models\Kepuasan;
use App\Models\Nilai;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\ProfileResponden;
use App\Models\Responden;

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
            $profileResponden = ProfileResponden::where('ProfileRespondenId', $item->NilaiRespondenId)->first();
            
            if($profileResponden->nilai->count() == 1)
            {
                Kepuasan::where('KepuasanProfileRespondenId', $profileResponden->ProfileRespondenId)->delete();
                $profileResponden->delete();
            }

            $item->delete();
        }

        $pertanyaan->delete();

        return back()->with('success', 'Data Pertanyaan Has Been Deleted!');
    }

    public function editpertanyaanview(int $id)
    {
        $pertanyaan = Pertanyaan::find($id);
        return view('admin.datapertanyaan.edit', ['title' => 'Dinas Sosial Bojonegoro', 'pertanyaan' => $pertanyaan]);
    }

    public function editpertanyaan(Request $request, int $id)
    {

        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->update($request->all());
        
        return redirect('/datapertanyaan')->with('success', 'Data Pertanyaan Has Been Updated!');
    }
}
