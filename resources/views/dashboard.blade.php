@extends('layouts.app')

@section('title', 'Dashboard - Project IoT')

@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <!-- Panel de Filtros (estático) -->
    <div class="filter-panel mb-4">
        <h5>Filtros</h5>
        <div class="row">
            <div class="col-md-4">
                <select class="form-select" id="station-filter" disabled>
                    <option value="">Todas las Estaciones</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}">{{ $station->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="start-date" disabled>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="end-date" disabled>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <select class="form-select" id="group-by" disabled>
                    <option value="hour">Por Hora</option>
                    <option value="day">Por Día</option>
                    <option value="month">Por Mes</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success mt-2" id="apply-filter" disabled>Aplicar</button>
            </div>
        </div>
    </div>

    <!-- Métricas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="metric-card">
                <h6>Sensores Online</h6>
                <p class="display-6">{{ $onlineSensors }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="metric-card">
                <h6>Última Sync</h6>
                <p class="display-6">N/A</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="metric-card">
                <h6>Registros en DB</h6>
                <p class="display-6">{{ $totalRecords }}</p>
            </div>
        </div>
    </div>

    <!-- Tabla de Estaciones -->
    <h4>Estaciones</h4>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stations as $station)
                <tr>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->city->name ?? 'N/A' }}</td>
                    <td><span class="badge {{ $station->status ? 'badge-success' : 'badge-offline' }}">{{ $station->status ? 'Activo' : 'Inactivo' }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabla de Sensores -->
    <h4>Sensores</h4>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Abrev.</th>
                <th>Departamento</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensors as $sensor)
                <tr>
                    <td>{{ $sensor->name }}</td>
                    <td>{{ $sensor->code }}</td>
                    <td>{{ $sensor->abbrev ?? 'N/A' }}</td>
                    <td>{{ $sensor->department->name ?? 'N/A' }}</td>
                    <td><span class="badge {{ $sensor->status ? 'badge-success' : 'badge-offline' }}">{{ $sensor->status ? 'Activo' : 'Inactivo' }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection