@extends('layouts.app')

@section('title', 'Create Sensor - Project IoT')

@section('content')
    <div class="container mt-5">
        <h1>Create New Sensor</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sensors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
            </div>
            <div class="mb-3">
                <label for="abbrev" class="form-label">Abbreviation</label>
                <input type="text" name="abbrev" class="form-control" value="{{ old('abbrev') }}">
            </div>
            <div class="mb-3">
                <label for="id_department" class="form-label">Department</label>
                <select name="id_department" class="form-control" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }}> Active
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('sensors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection