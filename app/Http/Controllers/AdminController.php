<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nilai;
use App\Helpers\MonthHelper;
use Illuminate\Http\Request;
use App\Models\ProfileResponden;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $search = $request->input('search');
        $nilai = Nilai::all();
        $profileRespondenQuery = ProfileResponden::query();
    
        if ($search) 
        {
            // Convert the month name to month number
            $monthNumber = MonthHelper::getMonthName($search);
            $profileRespondenQuery->whereMonth('ProfileRespondenCreatedAt', $monthNumber);
            
            $profileResponden = $profileRespondenQuery->latest()->paginate(5)->appends(['search' => $search]);
    
            if ($profileResponden->isEmpty())
            {
                return back()->with('error', 'Tidak ada data di bulan ' . $search .  ' !');
            }
        }
        else
        {
            $profileResponden = $profileRespondenQuery->latest()->paginate(5);
        }
    
        // Collect month names for each profileResponden item
        $monthHelper = new MonthHelper();
        $months = [];
        foreach ($profileResponden as $item)
        {
            $months[$item->ProfileRespondenId] = $monthHelper->getMonths($item->ProfileRespondenCreatedAt->format('m'));
        }
        
        return view('admin.dataresponden.index', [
            'title' => 'Dinas Sosial Bojonegoro',
            'profileResponden' => $profileResponden,
            'nilai' => $nilai,
            'months' => $months,
            'search' => $search
        ]);
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
        
        $getDataGenderSame = ProfileResponden::select('JenisKelamin')
        ->get()
        ->groupBy('JenisKelamin')
        ->map(function ($genderGroup) {
            return $genderGroup->count();
        });
        
        $jenisKelamin = [
            'JenisKelamin' => $getDataGenderSame->keys(),
            'TotalData' => $getDataGenderSame->sum(),
            'Data Jenis Kelamin' => $getDataGenderSame
        ];

        $getAge = ProfileResponden::select('Umur')
        ->get()
        ->groupBy('Umur')
        ->map(function ($ageGroup) {
            return $ageGroup->count();
        });

        $age = [
            'Umur' => $getAge->keys(),
            'TotalData' => $getAge->sum(),
            'Data Umur' => $getAge
        ];

        $getPendidikan = ProfileResponden::select('PendidikanTerakhir')
        ->get()
        ->groupBy('PendidikanTerakhir')
        ->map(function ($pendidikanGroup) {
            return $pendidikanGroup->count();
        });

        $pendidikan = [
            'Pendidikan' => $getPendidikan->keys(),
            'TotalData' => $getPendidikan->sum(),
            'Data Pendidikan' => $getPendidikan
        ];
        
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

        return view('public.diagram', [
            'title' => 'Dinas Sosial Bojonegoro',
            'data' => $data,
            'jenisKelamin' => $jenisKelamin,
            'umur' => $age,
            'pendidikan' => $pendidikan
        ]);
    }
}

