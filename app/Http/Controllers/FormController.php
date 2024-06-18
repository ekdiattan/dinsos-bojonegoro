<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Nilai;
use App\Models\Responden;
use App\Models\Pertanyaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProfileResponden;

class FormController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        $year = date('Y');
        return view('form', ['title' => 'Dinas Sosial Bojonegoro', 'pertanyaan' => $pertanyaan, 'year' => $year]);
    }

    public function store(Request $request)
    {
        $nilai = [];
        $pertanyaans = Pertanyaan::all();

        $profileResponden = ProfileResponden::create([
            'NamaPerusahaanInstansiPerorangan' => $request->NamaPerusahaanInstansiPerorangan,
            'Alamat' => $request->Alamat,
            'Pekerjaan' => $request->Pekerjaan,
            'NomorTelepon' => $request->NomorTelepon,
            'Umur' => $request->Umur,
            'Agama' => $request->Agama,
            'JenisKelamin' => $request->JenisKelamin,
            'StatusResponden' => $request->StatusResponden,
            'PendidikanTerakhir' => $request->PendidikanTerakhir,
            'KritikSaran' => $request->KritikSaran
        ]);

        foreach ($pertanyaans as $item) 
        {
            $nilai[$item->PertanyaanId] = [

                // 'PertanyaanId' => $item->PertanyaanId,
                'NilaiSangatBaik' => in_array($request->input("nilai_{$item->PertanyaanId}"), ['Sangat Baik']),
                'NilaiBaik' => in_array($request->input("nilai_{$item->PertanyaanId}"), ['Baik']),
                'NilaiKurangBaik' => in_array($request->input("nilai_{$item->PertanyaanId}"), ['Kurang Baik']),
                'NilaiTidakBaik' => in_array($request->input("nilai_{$item->PertanyaanId}"), ['Tidak Baik'])
            ];
            
            $nilai =Nilai::create([
                'NilaiPertanyaanId' => $item->PertanyaanId,
                'NilaiRespondenId' => $profileResponden->ProfileRespondenId,  
                'NilaiSangatBaik' => $nilai[$item->PertanyaanId]['NilaiSangatBaik'],
                'NilaiBaik' => $nilai[$item->PertanyaanId]['NilaiBaik'],
                'NilaiKurangBaik' => $nilai[$item->PertanyaanId]['NilaiKurangBaik'],
                'NilaiTidakBaik' => $nilai[$item->PertanyaanId]['NilaiTidakBaik']
            ]);
        }

        return redirect('/form')->with('success', 'The respondent has been registered successfully!');
    }
}
