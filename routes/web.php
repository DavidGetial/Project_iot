<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SensorController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/stations', [StationController::class, 'index'])->name('stations.index');
Route::get('/stations/create', [StationController::class, 'create'])->name('stations.create');
Route::post('/stations', [StationController::class, 'store'])->name('stations.store');
Route::get('/sensors', [SensorController::class, 'index'])->name('sensors.index');
Route::get('/sensors/create', [SensorController::class, 'create'])->name('sensors.create'); // Nueva ruta
Route::post('/sensors', [SensorController::class, 'store'])->name('sensors.store'); // Opcional, para guardar