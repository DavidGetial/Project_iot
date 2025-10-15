@extends('layouts.app')

@section('title', 'Create Station - Project IoT')

@section('content')
    <div class="container mt-5">
        <h1>Create New Station</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('stations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="id_city" class="form-label">City</label>
                <select name="id_city" class="form-control" required>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }}> Active
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('stations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection