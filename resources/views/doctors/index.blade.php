@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Listado</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-success">
                    Nueva Doctor
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
                @foreach ($doctors as $doctor)
                <tr>
                    <th scope="row">
                        {{ $doctor->name }}
                    </th>
                    <td>
                        {{ $doctor->email }}
                    </td>
                    <td>
                        {{ $doctor->identification }}
                    </td>
                    <td>
                        <div class="container col-12 d-flex justify-content-center">
                            <a href="{{ route('doctors.edit',$doctor) }}" class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('doctors.destroy',$doctor) }}" method="post">
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
    <div class="card-body">
        {!! $doctors->links() !!}
    </div>
</div>
@endsection
