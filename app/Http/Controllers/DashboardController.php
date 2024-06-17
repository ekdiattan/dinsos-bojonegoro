<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileResponden;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

        return view('welcome', ['title' => 'Dinas Sosial Bojonegoro', 'yearData' => $yearData, 'year' => $year]);
    }
}
