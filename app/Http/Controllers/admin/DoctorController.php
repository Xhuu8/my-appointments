<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialty;

class DoctorController extends Controller
{
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
        // Return the view with the list of doctors
        $doctors = User::where('role', 'doctor')->orderBy('id')->cursorPaginate(5);
        // $doctors = User::all();
        // dd($doctors);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roles;
        $specialties = Specialty::all();
        // dd($specialties);
        return view('doctors.create', compact('roles', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        // dd($this->validationsReques($request));
        //dd($request->all());
        $this->validationsReques($request, null);
        // Create a new doctor
        // Validate the request data
        $pas = isset($request->password) ? bcrypt($request->password) : bcrypt('12345678');

        // Create a new doctor
        $doctor = new User();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->identification = $request->identification;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->city = $request->city;
        $doctor->state = $request->state;
        $doctor->country = $request->country;
        $doctor->avatar = $request->avatar;
        $doctor->role = 'doctor';
        $doctor->is_active = $request->is_active ? true : false;
        $doctor->password = isset($request->password) ? bcrypt($request->password) : bcrypt('12345678');
        // dd($doctor);
        $doctor->save();

        //crea y usa la relacion del modelo para registrar el array de specialdades con attach

        $doctor->specialties()->attach($request->input('specialties'));

        // Redirect to the doctors index with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the doctor by ID
        $doctor = User::findOrFail($id);

        // Return the view with the doctor's details
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the doctor by ID
        $doctor = User::findOrFail($id);
        $roles = $this->roles;
        $specialties = Specialty::all();
        //con esta lines hacemo una busqueda atraves de la relacion del modelo usuarios y con "pluck" busca y trae los datos solicitados en un array que tengan realacion con el usuario
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');
        // dd($specialty_ids);
        // Return the view to edit the doctor
        return view('doctors.edit', compact('doctor', 'roles', 'specialties', 'specialty_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $this->validationsReques($request, $id);

        // Find the doctor by ID
        $doctor = User::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->identification = $request->identification;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->city = $request->city;
        $doctor->state = $request->state;
        $doctor->country = $request->country;
        $doctor->avatar = $request->avatar;
        $doctor->role = $request->role;
        $doctor->is_active = $request->is_active ? true : false;
        // If a new password is provided, hash it
        if ($request->filled('password')) {
            $doctor->password = bcrypt($request->password) ?: bcrypt('12345678');
        }
        // Save the updated doctor
        $doctor->save();

        // con esta linea lo que hace es por medio del modelo y relacion es buscar y actualizar los registros en la tabla de relaciones
        $doctor->specialties()->sync($request->input('specialties'));

        // Redirect to the doctors index with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the doctor by ID
        $doctor = User::findOrFail($id);

        // Delete the doctor
        $doctor->delete();

        // Redirect to the doctors index with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}