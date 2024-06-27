<?php

namespace App\Http\Controllers;

use App\Models\Kepuasan;
use App\Models\ProfileResponden;

class DashboardController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $profileResponden = ProfileResponden::all();

        $yearData = $profileResponden->groupBy(function ($item) {
            return date('Y', strtotime($item->ProfileRespondenCreatedAt));
        })->map(function ($item) {
            return ['year' => $item[0]->ProfileRespondenCreatedAt->format('Y'), 'data' => $item->count()];
        })->sortBy('year')->values()->all();

        $kepuasan = [
            'KepuasanSangatPuas' => Kepuasan::where('KepuasanSangatPuas', 1)->count(),
            'KepuasanPuas' => Kepuasan::where('KepuasanPuas', 1)->count(),
            'KepuasanCukupPuas' => Kepuasan::where('KepuasanCukupPuas', 1)->count(),
            'KepuasanTidakPuas' => Kepuasan::where('KepuasanTidakPuas', 1)->count(),
            'TotalPuas' => Kepuasan::count()
        ];
        
        return view('welcome', ['title' => 'Dinas Sosial Bojonegoro', 'yearData' => $yearData, 'year' => $year]);
    }
}
