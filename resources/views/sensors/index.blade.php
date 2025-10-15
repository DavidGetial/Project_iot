@extends('layouts.app')

@section('content')
    <h5>Sensores</h5>
    <a href="/sensors/create" class="btn btn-sm btn-primary mb-3">Nuevo Sensor</a>
    <table class="table table-striped">
        <thead><tr><th>Nombre</th><th>Código</th><th>Departamento</th><th>Estado</th></tr></thead>
        <tbody>
            @foreach($sensors as $s)
                <tr>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->code }}</td>
                    <td>{{ $s->department->name }} ({{ $s->department->country->name }})</td>
                    <td><span class="badge {{ $s->status ? 'badge-active' : 'badge-inactive' }}">{{ $s->status ? 'Activo' : 'Inactivo' }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection