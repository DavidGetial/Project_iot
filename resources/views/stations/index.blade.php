@extends('layouts.app')

@section('title', 'Stations - Project IoT')

@section('content')
    <div class="container mt-5">
        <h1>Stations</h1>
        @if ($stations->isEmpty())
            <p>No stations found.</p>
        @else
            <ul>
                @foreach ($stations as $station)
                    <li>{{ $station->name }} (City: {{ $station->city->name ?? 'N/A' }}) - Status: {{ $station->status ? 'Active' : 'Inactive' }}</li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('stations.create') }}" class="btn btn-primary">Add New Station</a>
    </div>
@endsection