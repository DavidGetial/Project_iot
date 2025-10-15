<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::with('city')->orderBy('name')->get();
        return view('stations.index', compact('stations'));
    }

    public function create()
    {
        $cities = \App\Models\City::all();
        return view('stations.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_city' => 'required|exists:cities,id',
            'status' => 'boolean',
        ]);

        Station::create($validatedData);

        return redirect()->route('stations.index')->with('success', 'Station created successfully!');
    }
}