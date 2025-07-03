<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
        // return view('specialties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|max:1000',
        ]);


        Specialty::create($request->all());

        return redirect()->route('specialties.index')->with('success', 'Specialty created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
        // return view('specialties.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialty $specialty)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|max:1000',
        ]);

        $specialty->update($request->all());

        return redirect()->route('specialties.index')->with('success', 'Specialty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();

        return redirect()->route('specialties.index')->with('success', 'Specialty deleted successfully.');
    }
}