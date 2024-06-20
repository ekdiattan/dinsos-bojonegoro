<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function viewDiagram()
    {
        $currentYear = Carbon::now()->year;
        $nilai = Nilai::whereYear('NilaiCreatedAt', $currentYear)->get();
    
        $data = [
            'SangatBaik' => [],
            'Baik' => [],
            'KurangBaik' => [],
            'TidakBaik' => []
        ];
    
        // Initialize arrays for each month
        for ($i = 1; $i <= 12; $i++) {
            $data['SangatBaik'][$i] = 0;
            $data['Baik'][$i] = 0;
            $data['KurangBaik'][$i] = 0;
            $data['TidakBaik'][$i] = 0;
        }
    
        foreach ($nilai as $n) {
            $month = Carbon::parse($n->NilaiCreatedAt)->month;
            if ($n->NilaiSangatBaik == 1) {
                $data['SangatBaik'][$month]++;
            }
            if ($n->NilaiBaik == 1) {
                $data['Baik'][$month]++;
            }
            if ($n->NilaiKurangBaik == 1) {
                $data['KurangBaik'][$month]++;
            }
            if ($n->NilaiTidakBaik == 1) {
                $data['TidakBaik'][$month]++;
            }
        }
        // dd($data);
        return view('public.diagram', [
            'title' => 'Dinas Sosial Bojonegoro',
            'data' => $data,
        ]);
    }
}
