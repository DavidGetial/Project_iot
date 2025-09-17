@extends('layout.app')
@section('title','inicio')
@section('content')

<style>
  body {
    background-color: #d6e4f1; /* Nuevo color de fondo azul grisáceo suave */
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
    background-color: #007bff; /* Azul profesional para el encabezado */
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
    font-size: 2.5rem; /* Tamaño de fuente más grande para datos */
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
                <p class="h3">3</p>
                <p class="text-muted">Datos simulados | Actualizable</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6>Sincronización</h6>
                <p class="h3">Hace 2 min</p>
                <p class="text-muted">Simulada por la demo</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6>Base de datos</h6>
                <p class="h3">MySQL</p>
                <p class="text-muted">Conectada vía MySQL</p>
              </div>
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

@endsection