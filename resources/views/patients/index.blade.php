@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Listado</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('patients.create') }}" class="btn btn-sm btn-success">
                    Nueva Paciente
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Identi</th>
                    <th scope="col">Opcciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <th scope="row">
                        {{ $patient->name }}
                    </th>
                    <td>
                        {{ $patient->email }}
                    </td>
                    <td>
                        {{ $patient->identification }}
                    </td>
                    <td>
                        <div class="container col-12 d-flex justify-content-center">
                            <a href="{{ route('patients.edit',$patient) }}" class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('patients.destroy',$patient) }}" method="post">
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
