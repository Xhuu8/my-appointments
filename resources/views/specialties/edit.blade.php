@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">

                    Nueva Especialidad
                </h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('specialties.index') }}" class="btn btn-sm  btn-secondary">Cancelar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('specialties.update',$specialty) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre de la especialidad</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$specialty->name) }}"
                    placeholder="Ingrese el nombre de la especialidad" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description"
                    value="{{ old('description',$specialty->name) }}"
                    placeholder="Ingrese una descripción de la especialidad" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-sm  btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
