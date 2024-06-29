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
            'KepuasanSangatPuasPersen' => Kepuasan::count() > 0 ? number_format((Kepuasan::where('KepuasanSangatPuas', 1)->count() / Kepuasan::count()) * 100, 2) : 0,
            'KepuasanPuasPersen' => Kepuasan::count() > 0 ? number_format((Kepuasan::where('KepuasanPuas', 1)->count() / Kepuasan::count()) * 100, 2) : 0,
            'KepuasanCukupPuasPersen' => Kepuasan::count() > 0 ? number_format((Kepuasan::where('KepuasanCukupPuas', 1)->count() / Kepuasan::count()) * 100, 2) : 0,
            'KepuasanTidakPuasPersen' => Kepuasan::count() > 0 ? number_format((Kepuasan::where('KepuasanTidakPuas', 1)->count() / Kepuasan::count()) * 100, 2) : 0
        ];
        
        return view('welcome', ['title' => 'Dinas Sosial Bojonegoro', 'yearData' => $yearData, 'year' => $year, 'kepuasan' => $kepuasan]);
    }
}
