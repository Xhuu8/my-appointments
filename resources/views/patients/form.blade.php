<div class="form-row">
    <div class="col-12">
        <div class="form-grup">
            <label for="description">Descripcion</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Describe brevemente la consulta">
        </div>
    </div>
    <div class="col-4">
        <div class="form-grup">
            <label for="name">Especialidad</label>

            <select class="form-control" id="specialty" name="specialty" required>
                <option value="">Especialidad</option>
                @foreach ($specialties as $value)
                <option value="{{ $value->id }}" {{ old('specialty', isset($value->specialty) ? $value->specialty : '')
                    ==
                    $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-grup">
            <label for="name">Medico</label>
            <select class="form-control" id="doctor" name="doctor" required>
            </select>
        </div>
    </div>
    <div class="col-4">
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
    </div>
</div>
<div class="form-grup">
    <label for="name">Hora de atención</label>
    <div class="alert alert-info" role="alert">
        <strong>selecciona un medico</strong>
    </div>
    <div id="hours">
    </div>
</div>
<div class="form-grup">
    <label for="name">tipo de cita</label>
    <div class="custom-control custom-radio">
        <input type="radio" id="type1" name="customRadio" class="custom-control-input" checked>
        <label class="custom-control-label" for="type1">Consulta</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="type2" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="type2">Examen</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="type3" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="type3">Operacion</label>
    </div>
</div>

<hr>
<button type="submit" class="btn btn-sm  btn-primary">Guardar</button>