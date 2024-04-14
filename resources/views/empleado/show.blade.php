@extends('app.header')

@section('content')
<div class="container mt-5">
    <h1  class="text-center">Empleado</h1>

    @empty($empleado)
    <div class="alert alert-warning">
        ¡No se encontró información del empleado!
    </div>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="2" style="text-align: center;">Informacion del Empleado: {{ $empleado->id }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-align: right;">Nombre:</th>
                <td>{{ $empleado->nombre }}</td>
            </tr>
            <tr>
                <th style="text-align: right;">Puesto:</th>
                <td>{{ $empleado->puesto }}</td>
            </tr>
            <tr>
                <th style="text-align: right;">Edad:</th>
                <td>{{ $empleado->edad }}</td>
            </tr>
            <tr>
                <th style="text-align: right;">Fecha de Nacimiento:</th>
                <td>{{ $empleado->fecha_nacimiento }}</td>
            </tr>
            <tr>
                <th style="text-align: right;">Sueldo Diario:</th>
                <td>{{ $empleado->sueldo_diario }}</td>
            </tr>
        </tbody>
    </table>
    @endempty
    <div class="text-center mt-3">
        <a href="{{ route('empleado.listing') }}" class="btn btn-primary">Regresar</a>
    </div>
</div>

@endsection