<div class="form-grup">
    <label for="name">Especialidad</label>

    <select class="form-control" id="specialty" name="specialty_id" required>
        <option value="">Especialidad</option>
        @foreach ($specialties as $value)
        <option value="{{ $value->id }}" {{ old('specialty_id', isset($value->specialty) ? $value->specialty : '') ==
            $value->id ?
            'selected' : ''
            }}>
            {{ $value->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-grup">
    <label for="name">Medico</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', isset($patient->name) ? $patient->name : '') }}"
        placeholder="Ingrese el nombre del paciente" required>
</div>
<div class="form-group">
    <label for="name">Fecha</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2020">
    </div>
</div>
<div class="form-grup">
    <label for="name">Hora de atención</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', isset($patient->name) ? $patient->name : '') }}"
        placeholder="Ingrese el nombre del paciente" required>
</div>
<hr>
<button type="submit" class="btn btn-sm  btn-primary">Guardar</button>