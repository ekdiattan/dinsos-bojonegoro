<?php

namespace App\Http\Controllers;

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
        return view('form', compact('pertanyaan'));
    }

    public function store(Request $request)
    {
        // Profile Responden
        $profileResponden = ProfileResponden::create([

        ]);

        // Responden
        $responden = Responden::create([
            'RespondenProfieId' => $profileResponden->ProfileRespondenId,
            'RespondenPertanyaanId' => $request->PertanyaanId
        ]);

        // Nilai
        $nilai = Nilai::create([

        ]);
    }
}
