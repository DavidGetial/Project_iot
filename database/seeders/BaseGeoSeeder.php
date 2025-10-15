<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\Department;
use App\Models\City;

class BaseGeoSeeder extends Seeder {
    public function run(): void {
        DB::transaction(function () {
            $country = Country::create([
                'name' => 'Colombia',
                'code' => 'CO',
                'abbrev' => 'COL',
                'status' => true,
            ]);

            $antioquia = Department::create([
                'name' => 'Antioquia',
                'code' => 'ANT',
                'abbrev' => 'ANT',
                'status' => true,
                'id_country' => $country->id,
            ]);

            $cundinamarca = Department::create([
                'name' => 'Cundinamarca',
                'code' => 'CUN',
                'abbrev' => 'CUN',
                'status' => true,
                'id_country' => $country->id,
            ]);

            City::create([
                'name' => 'Medellín',
                'code' => 'MED',
                'abbrev' => 'MED',
                'status' => true,
                'id_department' => $antioquia->id,
            ]);

            City::create([
                'name' => 'Bogotá',
                'code' => 'BOG',
                'abbrev' => 'BOG',
                'status' => true,
                'id_department' => $cundinamarca->id,
            ]);

            City::create([
                'name' => 'Chía',
                'code' => 'CHI',
                'abbrev' => 'CHI',
                'status' => true,
                'id_department' => $cundinamarca->id,
            ]);
        });
    }
}