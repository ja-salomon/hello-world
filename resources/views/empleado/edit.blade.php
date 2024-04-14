@extends('app.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Empleado') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empleado.update', $old->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{$old->id}}">
                        <div class="form-group">
                            <label for="nombre">{{ __('Nombre') }}</label>
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $old->nombre }}" required autocomplete="nombre" autofocus>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="edad">{{ __('Edad') }}</label>
                            <input id="edad" type="number" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{ $old->edad }}" required autocomplete="edad">
                            @error('edad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="puesto">{{ __('Puesto') }}</label>
                            <input id="puesto" type="text" class="form-control @error('puesto') is-invalid @enderror" name="puesto" value="{{ $old->puesto }}" required autocomplete="puesto">
                            @error('puesto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento">{{ __('Fecha de Nacimiento') }}</label>
                            <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ $old->fecha_nacimiento }}" required autocomplete="fecha_nacimiento">
                            @error('fecha_nacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sueldo_diario">{{ __('Sueldo Diario') }}</label>
                            <input id="sueldo_diario" type="number" class="form-control @error('sueldo_diario') is-invalid @enderror" name="sueldo_diario" value="{{ $old->sueldo_diario }}" required autocomplete="sueldo_diario">
                            @error('sueldo_diario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dias_trabajados">{{ __('Dias Trabajados') }}</label>
                            <input id="dias_trabajados" type="number" class="form-control @error('dias_trabajados') is-invalid @enderror" name="dias_trabajados" value="{{ $old->dias_trabajados }}" required autocomplete="dias_trabajados">
                            @error('dias_trabajados')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group my-2 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Grabar') }}
                            </button>
                            <a href="{{ route('empleado.listing') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection