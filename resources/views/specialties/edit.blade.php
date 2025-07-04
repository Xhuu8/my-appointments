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
            @include('specialties.form')
        </form>
    </div>
</div>
@endsection
