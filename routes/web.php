<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SensorController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/stations', [StationController::class, 'index'])->name('stations.index'); // Para ver la lista
Route::get('/stations/create', [StationController::class, 'create'])->name('stations.create'); // Para el formulario
Route::post('/stations', [StationController::class, 'store'])->name('stations.store'); // Para guardar
Route::get('/sensors', [SensorController::class, 'index'])->name('sensors.index');