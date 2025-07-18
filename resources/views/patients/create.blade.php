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
    let $doctor;
    $(function (){
        // debugger;
        const $specialty = $('#specialty')
        $doctor = $('#doctor');
        $specialty.change(()=>{
            const specialtyId = $specialty.val();
            const url = `/specialties/${specialtyId}/doctors`;
            $.getJSON(url, onDoctorsLoaded);
        });
    });

    function onDoctorsLoaded(doctors){
        // debugger;
        let htmlOptions ='';

        doctors.forEach(doctor => {
            htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;
        });
        $doctor.html(htmlOptions);
        // console.log(htmlOption);
    }
</script>
@endsection