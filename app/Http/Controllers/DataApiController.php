<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use Illuminate\Support\Facades\DB;

class DataApiController extends Controller
{
    public function telemetry(Request $request)
    {
        $request->validate([
            'station_id' => 'required|integer|exists:stations,id',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'group' => 'nullable|in:hour,day,month'
        ]);

        $stationId = (int) $request->station_id;
        $from = $request->input('from', now()->subDays(7));
        $to = $request->input('to', now());
        $group = $request->input('group', 'hour');

        $query = SensorData::where('id_station', $stationId)
                           ->whereBetween('created_at', [$from, $to]);

        // Agrupar datos según el filtro
        $groupBy = match($group) {
            'hour' => DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:00:00")'),
            'day' => DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d 00:00:00")'),
            'month' => DB::raw('DATE_FORMAT(created_at, "%Y-%m-01 00:00:00")'),
            default => DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:00:00")')
        };

        $data = $query->select(
            $groupBy . ' as label',
            DB::raw('AVG(temp_value) as avg_temp'),
            DB::raw('AVG(humidity) as avg_humidity')
        )
        ->groupBy(DB::raw('1'))
        ->orderBy('label')
        ->get();

        $labels = $data->pluck('label');
        $tempData = $data->pluck('avg_temp');
        $humidityData = $data->pluck('avg_humidity');

        return response()->json([
            'success' => true,
            'labels' => $labels,
            'tempData' => $tempData,
            'humidityData' => $humidityData
        ]);
    }
}