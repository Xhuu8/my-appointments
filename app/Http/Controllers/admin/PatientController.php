<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function __construct()
    {
        // Apply the auth middleware to all methods except index
        $this->middleware('auth')->except(['index']);
    }
    /**
     * The roles available for the user.
     *
     * @var array
     */
    protected $roles = [
        'doctor' => 'doctor',
        'admin' => 'admin',
        'patient' => 'patient',
    ];
    /**
     * Validate the request data.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function validationsReques($request, $id)
    {
        // Validate the request data
        // If it's an update, we need to ignore the current user's email and identification
        if ($id != null) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'identification' => 'required|string|unique:users,identification,' . $id . '|max:18|min:8',
                'phone' => 'required|string|max:15',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:100',
                'state' => 'nullable|string|max:100',
                'country' => 'nullable|string|max:100',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'role' => 'required|in:doctor,admin,patient',
                'password' => 'nullable|string|min:8|confirmed|alpha_num',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'identification' => 'required|string|unique:users,identification|max:18|min:8',
                'phone' => 'required|string|max:15',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:100',
                'state' => 'nullable|string|max:100',
                'country' => 'nullable|string|max:100',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'role' => 'required|in:doctor,admin,patient',
                'password' => 'nullable|string|min:8|confirmed|alpha_num',
            ]);
        }

        return $request;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return the view with the list of patients
        $patients = User::where('role', 'patient')->orderBy('id')->cursorPaginate(5);
        // $patients = User::all();
        // dd($patients);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roles;
        // Get all specialties
        // dd($roles);
        return view('patients.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        // dd($this->validationsReques($request));
        // dd($request->all());
        $this->validationsReques($request, null);
        // Create a new patient
        // Validate the request data
        $pas = isset($request->password) ? bcrypt($request->password) : bcrypt('12345678');

        // Create a new patient
        $patient = new User();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->identification = $request->identification;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->city = $request->city;
        $patient->state = $request->state;
        $patient->country = $request->country;
        $patient->avatar = $request->avatar;
        $patient->role = 'patient';
        $patient->is_active = $request->is_active ? true : false;
        $patient->password = isset($request->password) ? bcrypt($request->password) : bcrypt('12345678');
        // dd($patient);
        $patient->save();

        // Redirect to the patients index with a success message
        return redirect()->route('patients.index')->with('success', 'patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the patient by ID
        $patient = User::findOrFail($id);

        // Return the view with the patient's details
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the patient by ID
        $patient = User::findOrFail($id);
        $roles = $this->roles;
        // Return the view to edit the patient
        return view('patients.edit', compact('patient', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $this->validationsReques($request, $id);

        // Find the patient by ID
        $patient = User::findOrFail($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->identification = $request->identification;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->city = $request->city;
        $patient->state = $request->state;
        $patient->country = $request->country;
        $patient->avatar = $request->avatar;
        $patient->role = $request->role;
        $patient->is_active = $request->is_active ? true : false;
        // If a new password is provided, hash it
        if ($request->filled('password')) {
            $patient->password = bcrypt($request->password) ?: bcrypt('12345678');
        }
        // Save the updated patient
        $patient->save();

        // Redirect to the patients index with a success message
        return redirect()->route('patients.index')->with('success', 'patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the patient by ID
        $patient = User::findOrFail($id);

        // Delete the patient
        $patient->delete();

        // Redirect to the patients index with a success message
        return redirect()->route('patients.index')->with('success', 'patient deleted successfully.');
    }
}