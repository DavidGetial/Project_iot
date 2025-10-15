<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Sensor;

class DashboardController extends Controller
{
    public function index()
    {
        $stations = Station::with('city')->orderBy('name')->get();
        $sensors = Sensor::with('department')->orderBy('name')->get();
        $onlineSensors = Sensor::where('status', true)->count();
        $totalRecords = 0; // Placeholder, ajusta si tienes una tabla de registros

        return view('dashboard', compact('stations', 'sensors', 'onlineSensors', 'totalRecords'));
    }
}