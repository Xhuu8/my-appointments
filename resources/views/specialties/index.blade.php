@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Especialidades</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('specialties.create') }}" class="btn btn-sm btn-success">
                    Nueva especialidad
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opcciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialties as $specialty)
                <tr>
                    <th scope="row">
                        {{ $specialty->name }}
                    </th>
                    <td>
                        {{ $specialty->description }}
                    </td>
                    <td>
                        <div class="container col-12 d-flex justify-content-center">
                            <a href="{{ route('specialties.edit',$specialty) }}"
                                class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('specialties.destroy',$specialty) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
