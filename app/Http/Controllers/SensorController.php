<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Department;
use Illuminate\Http\Request;

class SensorController extends Controller {
    public function index() {
        $sensors = Sensor::with('department.country')->orderBy('name')->get();
        return view('sensors.index', compact('sensors'));
    }

    public function create() {
        $departments = Department::with('country')->orderBy('name')->get();
        return view('sensors.create', compact('departments'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:sensors,code',
            'abbrev' => 'nullable',
            'id_department' => 'required|exists:departments,id',
            'status' => 'nullable'
        ]);
        Sensor::create([
            'name' => $data['name'],
            'code' => $data['code'],
            'abbrev' => $data['abbrev'] ?? null,
            'id_department' => $data['id_department'],
            'status' => (bool)$request->status
        ]);
        return redirect('/sensors');
    }
}