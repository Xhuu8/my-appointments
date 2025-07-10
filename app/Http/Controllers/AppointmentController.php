<?php

namespace App\Http\Controllers;

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
}
