<div class="form-grup">
    <label for="name">Especialidad</label>

    <select class="form-control" id="specialty" name="specialty" required>
        <option value="">Especialidad</option>
        @foreach ($specialties as $value)
        <option value="{{ $value->id }}" {{ old('specialty', isset($value->specialty) ? $value->specialty : '') ==
            $value->id ?
            'selected' : ''
            }}>
            {{ $value->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-grup">
    <label for="name">Medico</label>
    <select class="form-control" id="doctor" name="doctor" required>

    </select>
</div>
<div class="form-group">
    <label for="name">Fecha</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control datepicker" id="date" placeholder="Select date" type="text"
            value="{{ date('Y-m-d' )}}" data-date-format="yyyy-mm-dd" data-date-start-date="{{ date('Y-m-d' )}}"
            data-date-end-date="+30d">
    </div>
</div>
<div class="form-grup">
    <label for="name">Hora de atención</label>
    <div id="hours">
    </div>
</div>
<hr>
<button type="submit" class="btn btn-sm  btn-primary">Guardar</button>