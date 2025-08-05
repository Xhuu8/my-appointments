<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Specialty;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $specialties = Specialty::all();
        // dd($specialties);
        return view('patients.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->only([
            'description',
            'specialty_id',
            'doctor_id',
            'patient_id',
            'scheduled_date',
            'scheduled_time',
            'type',
        ]);
        Appointment::create($data);

        $notification = 'la cita esta guardada';
        return back()->with(compact('notification'));
    }
}