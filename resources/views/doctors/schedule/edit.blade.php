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
                    @foreach ($days as $key=>$day)
                    <tr>
                        <th scope="row">
                            {{-- <input type="text" name="day[]" value="{{ $key }}" class="form-control" readonly> --}}
                            {{ $day }}
                        </th>
                        <td>
                            <label class="custom-toggle">
                                <input type="checkbox" name="active[]" id="active[]" value="{{ $key }}">
                                <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                        </td>
                        <td>
                            <div class="row mb-2">
                                DE
                                <div class="col">
                                    <select name="morning_start[]" id="morning_start[]" class="form-control">
                                        @for ($i = 5; $i < 12; $i++) <option value="{{ $i }}:00">{{ $i }}:00 am</option>
                                            <option value="{{ $i }}:30">{{ $i }}:30 am</option>
                                            @endfor
                                    </select>
                                </div>
                                A
                                <div class="col">
                                    <select name="morning_end[]" id="morning_end[]" class="form-control">
                                        @for ($i = 5; $i < 12; $i++) <option value="{{ $i }}:00">{{ $i }}:00 am</option>
                                            <option value="{{ $i }}:30">{{ $i }}:30 am</option>
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
                                        @for ($i = 1; $i < 12; $i++) <option value="{{ $i }}:00">{{ $i }}:00 pm</option>
                                            <option value="{{ $i+12 }}:30">{{ $i }}:30 pm</option>
                                            @endfor
                                    </select>
                                </div>
                                A
                                <div class="col">
                                    <select name="afternoon_end[]" id="afternoon_end[]" class="form-control">
                                        @for ($i = 1; $i < 12; $i++) <option value="{{ $i }}:00">{{ $i }}:00 pm</option>
                                            <option value="{{ $i+12 }}:30">{{ $i }}:30 pm</option>
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
