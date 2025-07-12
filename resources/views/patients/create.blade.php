@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">
                    Registrar cita
                </h3>
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
        <form action="{{ route('patient.appointments.store') }}" method="post">
            @csrf
            @include('patients.form')
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(function (){

        $('#specialty_id').change(()=> {
            const $specialtyId = $('#specialty_id');
            // const specialtyId = $(this).val();
            const uri = `/specialties/${specialtyId}/doctors`;
            $.getJSON( uri,onDoctorLoaded );
        });
    });

    function onDoctorLoaded (data) {
        console.log(data);
    }
</script>
@endsection