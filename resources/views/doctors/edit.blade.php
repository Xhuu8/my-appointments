@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">
                    Editar Doctor: {{ $doctor->name }}
                </h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('doctors.index') }}" class="btn btn-sm  btn-secondary">Cancelar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('doctors.update',$doctor) }}" method="post">
            @csrf
            @method('PUT')
            @include('doctors.form')
        </form>
    </div>
</div>
@endsection
