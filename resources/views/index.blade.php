@extends('layout.app')
@section('title', 'Inicio')
@section('content')

<style>
  body {
    background-color: #d6e4f1;
    font-family: 'Arial', sans-serif;
    color: #333;
  }
  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
  }
  .card:hover {
    transform: translateY(-5px);
  }
  .header-card {
    background-color: #007bff;
    color: white;
    border-radius: 10px 10px 0 0;
    padding: 1.5rem;
  }
  .card-body {
    padding: 1.5rem;
  }
  .stat-card {
    background-color: white;
    border-radius: 10px;
    padding: 1.5rem;
    text-align: center;
    margin-bottom: 1.5rem;
  }
  .stat-card h6 {
    font-size: 1rem;
    color: #6c757d;
    margin-bottom: 0.5rem;
  }
  .stat-card .h3 {
    font-size: 2.5rem;
    font-weight: 600;
    color: #007bff;
  }
  .stat-card p.text-muted {
    font-size: 0.9rem;
    color: #6c757d;
  }
  .module-btn {
    border-radius: 8px;
    padding: 1rem;
    font-size: 1.1rem;
    width: 100%;
    margin-bottom: 1rem;
    transition: background-color 0.3s;
  }
  .module-btn:hover {
    background-color: #0056b3;
    color: white;
  }
  .module-desc {
    font-size: 0.95rem;
    color: #6c757d;
    text-align: center;
    margin-bottom: 0;
  }
  .filter-section {
    margin-bottom: 2rem;
  }
  .filter-section select, .filter-section input {
    margin-right: 1rem;
    padding: 0.5rem;
    border-radius: 5px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
  }
  th, td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
  }
  th {
    background-color: #007bff;
    color: white;
  }
</style>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="header-card text-center">
          <h2>Panel IoT — Monitoreo & Registros</h2>
          <p class="lead">Captura datos (contactos/actores del proyecto), visualízalos en tabla y prepara el entorno para conectar SENSORES de dispositivos IoT</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="stat-card">
                <h6>Sensores en línea</h6>
                <p class="h3">{{ $onlineSensors ?? 0 }}</p>
                <p class="text-muted">Actualizable</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6>Última Sincronización</h6>
                <p class="h3">{{ $lastSync ?? 'N/A' }}</p>
                <p class="text-muted">Simulada por la demo</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6>Base de datos</h6>
                <p class="h3">PostgreSQL (Supabase)</p>
                <p class="text-muted">Conectada vía Supabase</p>
              </div>
            </div>
          </div>

          <!-- Sección de Filtros -->
          <div class="card mt-4">
            <div class="card-header text-center">
              <h4>Filtros</h4>
            </div>
            <div class="card-body filter-section">
              <form method="GET" action="{{ route('sensors.index') }}">
                <div class="row">
                  <div class="col-md-3">
                    <select name="station" id="station" class="form-control">
                      <option value="Todas las Estaciones">Todas las Estaciones</option>
                      @foreach ($stations as $station)
                        <option value="{{ $station->name }}" {{ old('station', $request->station) == $station->name ? 'selected' : '' }}>
                          {{ $station->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $request->start_date) }}" placeholder="dd/mm/aaaa">
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $request->end_date) }}" placeholder="dd/mm/aaaa">
                  </div>
                  <div class="col-md-2">
                    <select name="hour_filter" id="hour_filter" class="form-control">
                      <option value="">Selecciona</option>
                      <option value="Por Hora" {{ old('hour_filter', $request->hour_filter) == 'Por Hora' ? 'selected' : '' }}>Por Hora</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Aplicar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Tabla de Sensores -->
          <div class="card mt-4">
            <div class="card-header text-center">
              <h4>Sensores</h4>
            </div>
            <div class="card-body">
              <table>
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
                  @forelse ($sensors as $sensor)
                    <tr>
                      <td>{{ $sensor->name }}</td>
                      <td>{{ $sensor->code }}</td>
                      <td>{{ $sensor->abbrev }}</td>
                      <td>{{ $sensor->department->name ?? 'N/A' }}</td>
                      <td>{{ $sensor->status ? 'Activo' : 'Inactivo' }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">No hay sensores disponibles.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-5">
        <div class="card-header text-center">
          <h2>Módulos</h2>
        </div>
        <div class="card-body">
          @php
            $modules = [
              ['name' => 'Gestión de Registros', 'class' => 'btn-outline-primary', 'desc' => 'Crea y gestiona datos de registros, pacientemente o automáticamente'],
              ['name' => 'Dispositivos IoT', 'class' => 'btn-outline-success', 'desc' => 'Control de dispositivos ESP32/SM16706: asignación y manejo de pendientes'],
              ['name' => 'Panel Tiempo Real', 'class' => 'btn-outline-info', 'desc' => 'Gráficas de telemetría (SPO₂, pulso, temperatura) con WebSockets (pendiente)']
            ];
          @endphp
          @foreach ($modules as $module)
            <div class="mb-4">
              <button type="button" class="btn {{ $module['class'] }} module-btn">
                {{ $module['name'] }}
              </button>
              <p class="module-desc">{{ $module['desc'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Datepicker -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script>
  flatpickr("#start_date", {
    dateFormat: "d/m/Y",
  });
  flatpickr("#end_date", {
    dateFormat: "d/m/Y",
  });
</script>

@endsection