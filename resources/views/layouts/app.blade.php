<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>IoT Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #f0f8ff; font-family: 'Arial', sans-serif; }
        .navbar { background-color: #007bff; }
        .badge-active { background-color: #28a745; }
        .badge-inactive { background-color: #dc3545; }
        .card-metric { border-left: 5px solid #007bff; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">IoT Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/stations">Estaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sensors">Sensores</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>