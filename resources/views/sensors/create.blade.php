@extends('layouts.app')

@section('content')
    <h5>Nuevo Sensor</h5>
    <form action="/sensors" method="POST">
        @csrf
        <div class="mb-3"><label>Nombre</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Código</label><input type="text" name="code" class="form-control" required></div>
        <div class="mb-3"><label>Abreviatura</label><input type="text" name="abbrev" class="form-control"></div>
        <div class="mb-3">
            <label>Departamento</label>
            <select name="id_department" class="form-select" required>
                @foreach($departments as $d)
                    <option value="{{ $d->id }}">{{ $d->name }} - {{ $d->country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 form-check"><input type="checkbox" name="status" class="form-check-input" checked><label class="form-check-label">Activo</label></div>
        <button type="submit" class="btn btn-success">Crear</button>
    </form>
@endsection