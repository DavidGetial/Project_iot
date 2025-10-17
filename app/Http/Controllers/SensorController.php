<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Department; // Asegúrate de que el modelo Department exista
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::with('department')->orderBy('name')->get();
        return view('sensors.index', compact('sensors'));
    }

    public function create()
    {
        $departments = Department::all(); // Obtener departamentos para el formulario
        return view('sensors.create', compact('departments'));
    }

    // (Opcional) Método store para guardar
    /*
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'abbrev' => 'nullable|string|max:10',
            'id_department' => 'required|exists:departments,id',
            'status' => 'boolean',
        ]);

        Sensor::create($validatedData);

        return redirect()->route('sensors.index')->with('success', 'Sensor created successfully!');
    }
    */
}