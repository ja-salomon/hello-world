@extends('app.header')

@section('title')
Listado de empleados
@endsection

@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
    {{ Session::get('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
    {{ Session::get('error') }}
</div>
@endif

<h1 class="text-center">Tabla de Empleados</h1>
<div class="container ">
    <div class="row justify-content-center mt-5">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Puesto</th>
                    <th>Fecha de Nacimiento</th>
                    <th style="text-align: right;">Días Trabajados</th>
                    <th style="text-align: right;">Sueldo Diario</th>
                    <th style="text-align: right;">Sueldo</th>
                    <th style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                @php
                $sueldoFormateado = number_format($empleado->sueldo, 0);
                @endphp
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->edad }}</td>
                    <td>{{ $empleado->puesto }}</td>
                    <td>{{ $empleado->fecha_nacimiento }}</td>
                    <td style="text-align: right;">{{ $empleado->dias_trabajados }}</td>
                    <td style="text-align: right;">{{ $empleado->sueldo_diario }}</td>
                    <td style="text-align: right;">${{ $sueldoFormateado }}</td>
                    <td style="text-align: center;">
                        <div class="btn-group " role="group" aria-label="Acciones">
                            <a href="{{ route('empleado.show', [ 'id' => $empleado->id] ) }}" class="btn btn-sm btn-primary mx-1" data-toggle="modal" data-target="#editarModal">
                                <i class="bi bi-eye"></i></i> Ver
                            </a>
                            <a href="{{ route('empleado.edit', [ 'id' => $empleado->id] ) }}" class="btn btn-sm btn-primary mx-1" data-toggle="modal" data-target="#editarModal">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <a href="{{ route('empleado.destroy', [ 'id' => $empleado->id]) }}" class="btn btn-sm btn-danger mx-1" data-toggle="modal" data-target="#eliminarModal">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection