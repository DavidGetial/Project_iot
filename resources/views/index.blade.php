@extends('layout.app')
@section('title','inicio')
@section('content')

<div class="card" style="width: 18rem;">
  <img src="{{ asset('img/Sensor_de_Temperatura.jpg') }}" class="card-img-top" alt="Sensor de Temperatura">
  <div class="card-body">
    <p class="card-text">
      Un sensor de temperatura es un dispositivo que mide el calor o frío de un objeto, ambiente o superficie, convirtiendo esa información en una señal que puede ser interpretada por un sistema electrónico.
    </p>
  </div>
</div>

@endsection
