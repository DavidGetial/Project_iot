<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function index(Request $request)
    {
        $query = Sensor::with('department');

        // Obtener todas las estaciones únicas para el filtro
        $stations = Sensor::select('name')->distinct()->get();

        // Filtros
        if ($request->has('station') && $request->station != 'Todas las Estaciones') {
            $query->where('name', 'like', '%' . $request->station . '%');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::createFromFormat('d/m/Y', $request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($request->has('hour_filter') && $request->hour_filter == 'Por Hora') {
            $query->whereRaw('EXTRACT(HOUR FROM created_at) = ?', [now()->hour]);
        }

        $sensors = $query->orderBy('name')->get();

        // Estadísticas
        $onlineSensors = Sensor::where('status', true)->count();
        $lastSyncValue = Sensor::max('updated_at');
        $lastSync = $lastSyncValue ? Carbon::parse($lastSyncValue)->diffForHumans() : 'N/A';

        return view('sensors.index', compact('sensors', 'stations', 'onlineSensors', 'lastSync'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('sensors.create', compact('departments'));
    }

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

        return redirect()->route('sensors.index')->with('success', 'Sensor creado exitosamente!');
    }
}