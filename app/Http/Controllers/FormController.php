<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Nilai;
use App\Models\Responden;
use App\Models\Pertanyaan;
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
        try{
            dd($request->all());
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

            // Responden
            $responden = Responden::create([
                'RespondenProfieId' => $profileResponden->ProfileRespondenId,
                'RespondenPertanyaanId' => $request->PertanyaanId
            ]);

            // Nilai
            

        }catch(Exception $e){
            
        }
       
    }
}
