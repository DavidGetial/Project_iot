<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'abbrev', 'id_department', 'status']; // Agrega 'abbrev'
    protected $dates = ['deleted_at'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_department');
    }

    public function sensorData()
    {
        return $this->hasMany(SensorData::class, 'id_sensor');
    }
}