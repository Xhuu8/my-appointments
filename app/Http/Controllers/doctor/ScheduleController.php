<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\WorkDay;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

    public function edit()
    {
        // Logic to show the edit form for the doctor's schedule
        $days = $this->days;
        $workDays = WorkDay::where('user_id', auth()->user()->id)->get();
        $workDays->map(function ($workDay) { // Format the time fields to a more readable format
            $workDay->morning_start = (new Carbon($workDay->morning_start))->format('g:i A');
            $workDay->morning_end = (new Carbon($workDay->morning_end))->format('g:i A');
            $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
            $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
            return $workDay;
        });
        // dd($workDays)->too_array();
        return view('doctors.schedule.edit', compact('days', 'workDays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');
        // dd($morning_start, $morning_end, $afternoon_start, $afternoon_end, $active);


        $errors = [];
        for ($index = 0; $index < 7; $index++) {
            if ($morning_start[$index] >= $morning_end[$index] && in_array($index, $active)) {
                $errors[] = "la hora de inicio no puede ser mayor o igual al hora de salida del dia " . $this->days[$index] . " en turno matutino";
            }
            if ($afternoon_start[$index] >= $afternoon_end[$index] && in_array($index, $active)) {
                $errors[] = "la hora de inicio no puede ser mayor o igual al hora de salida del dia " . $this->days[$index] . " en turno despertino";
                // Skip this iteration if any time data is missing
            }

            WorkDay::updateOrCreate(
                [
                    'day' => $index,
                    'user_id' => auth()->user()->id,
                ],
                [
                    'active' => in_array($index, $active),
                    'morning_start' => $morning_start[$index],
                    'morning_end' => $morning_end[$index],
                    'afternoon_start' => $afternoon_start[$index],
                    'afternoon_end' => $afternoon_end[$index],
                ]
            );
        }





        // Redirect or return a response after storing the schedule
        if (count($errors) > 0) {
            return back()->with('error', $errors);
        } else {
            return back()->with('success', 'Guadado con Exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}