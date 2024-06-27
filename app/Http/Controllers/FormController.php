<?php

namespace App\Http\Controllers;

use App\Models\Kepuasan;
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
        dd($request->all());
        
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
        if($request->KepuasanSangatPuas == 'Sangat Puas' || $request->KepuasanPuas == 'Puas' || $request->KepuasanCukupPuas == 'Cukup Puas' || $request->KepuasanTidakPuas == 'Tidak Puas') {
            $value = 1;   
        }

        Kepuasan::create([
            'KepuasanSangatPuas' => $value ?? 0,
            'KepuasanPuas' => $value ?? 0,
            'KepuasanCukupPuas' => $value ?? 0,
            'KepuasanTidakPuas' => $value ?? 0
         ]);

        return redirect('/form')->with('success', 'The respondent has been registered successfully!');
    }
}
