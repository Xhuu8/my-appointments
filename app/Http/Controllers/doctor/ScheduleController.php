<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\WorkDay;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Logic to show the edit form for the doctor's schedule
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        // dd($days);
        return view('doctors.schedule.edit', compact('days'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        foreach ($request['active'] as $active) {
            WorkDay::updateOrCreate(
                [
                    'day' => $active,
                    'user_id' => auth()->user()->id,
                ],
                [
                    'is_active' => true,
                    'morning_start' => $request['morning_start'][$active],
                    'morning_end' => $request['morning_end'][$active],
                    'afternoon_start' => $request['afternoon_start'][$active],
                    'afternoon_end' => $request['afternoon_end'][$active],
                ]
            );
        }


        // Redirect or return a response after storing the schedule
        return back()->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}