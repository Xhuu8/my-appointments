@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">{{ auth()->user()->name }}</h3>
            </div>
        </div>
    </div>
    <form action="{{ route('doctor.schedule.store') }}" method="post">
        @csrf
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                <ul>
                    @foreach (session('error') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col text-right">
                <button type="submit" class="btn btn-sm btn-success">
                    Guardar Cambios
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <!-- Projects table -->

            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">activo</th>
                        <th scope="col">Turno Matutino</th>
                        <th scope="col">Turno Despertino</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workDays as $key => $workDay)

                    <tr>
                        <th scope="row">
                            {{ $days[$key] }}
                        </th>
                        <td>
                            <label class="custom-toggle">
                                <input type="checkbox" name="active[]" id="active[]" value="{{ $workDay->day }}"
                                    @if($workDay->active)
                                checked
                                @endif>
                                <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                        </td>
                        <td>
                            <div class="row mb-2">
                                DE
                                <div class="col">
                                    <select name="morning_start[]" id="morning_start[]" class="form-control">
                                        @for ($i = 5; $i <=11; $i++) <option value="{{ ($i<10 ? '0' :'').$i }}:00"
                                            @if($workDay->
                                            morning_start == $i.":00 AM") selected @endif>
                                            {{ $i }}:00 AM </option>
                                            <option value="{{ ($i<10 ? '0' :'').$i }}:30" @if($workDay->morning_start==
                                                $i.":30 AM")
                                                selected @endif>
                                                {{ $i }}:30 AM
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                A
                                <div class="col">
                                    <select name="morning_end[]" id="morning_end[]" class="form-control">
                                        @for ($i = 5; $i <= 11; $i++) <option value="{{ ($i<10 ? '0' :'').$i }}:00"
                                            @if($workDay->
                                            morning_end == $i.":00 AM") selected @endif>{{ $i }}:00 AM</option>
                                            <option value="{{ ($i<10 ? '0' :'').$i }}:30" @if($workDay->morning_end ==
                                                $i.":30 AM")
                                                selected @endif>{{ $i }}:30 AM</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                DE
                                <div class="col">
                                    <select name="afternoon_start[]" id="afternoon_start[]" class="form-control">
                                        @for ($i = 1; $i <= 11; $i++) <option value="{{ $i+12 }}:00" @if($workDay->
                                            afternoon_start == $i.":00 PM") selected @endif>{{ $i }}:00 PM</option>
                                            <option value="{{ $i+12 }}:30" @if($workDay->afternoon_start == $i.":30 PM")
                                                selected @endif>{{ $i }}:30 PM</option>
                                            @endfor
                                    </select>
                                </div>
                                A
                                <div class="col">
                                    <select name="afternoon_end[]" id="afternoon_end[]" class="form-control">
                                        @for ($i = 1; $i <= 11; $i++) <option value="{{ $i+12 }}:00" @if($workDay->
                                            afternoon_end == $i.":00 PM") selected @endif>{{ $i }}:00 PM</option>
                                            <option value="{{ $i+12 }}:30" @if($workDay->afternoon_end == $i.":30 PM")
                                                selected @endif>{{ $i }}:30 PM</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </form>
</div>
@endsection
