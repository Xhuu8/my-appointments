<div class="form-group">
    <label for="name">Nombre de la especialidad</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name',isset($specialty->name)? $specialty->name:'') }}"
        placeholder="Ingrese el nombre de la especialidad" required>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description"
        placeholder="Ingrese una descripción de la especialidad"
        rows="3">{{ old('description',isset($specialty->description)? $specialty->description:'') }}</textarea>
</div>
<button type="submit" class="btn btn-sm  btn-primary">Guardar</button>
