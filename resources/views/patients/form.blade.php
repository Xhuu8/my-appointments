<div class="form-grup">
    <label for="name">Nombre del paciente</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', isset($patient->name) ? $patient->name : '') }}"
        placeholder="Ingrese el nombre del paciente" required>
</div>
<div class="form-grup">
    <label for="identification">CURP o DNI</label>
    <input type="text" class="form-control" id="identification" name="identification"
        placeholder="Ingrese la identificacion del paciente"
        value="{{ old('identification', isset($patient->identification) ? $patient->identification : '') }}">
</div>
<div class="form-grup">
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ old('email', isset($patient->email) ? $patient->email : '') }}"
        placeholder="Ingrese el correo electrónico del paciente" required>
</div>
<div class="form-grup">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password"
        placeholder="Ingrese la contraseña del paciente">
</div>
<div class="form-grup">
    <label for="password_confirmation">Confirmar contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="Confirme la contraseña del paciente">
</div>
<div class="form-grup">
    <label for="role">Rol</label>
    <select class="form-control" id="role" name="role" required>
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $key => $value)
        <option value="{{ $key }}" {{ old('role', isset($patient->role) ? $patient->role : '') == $key ? 'selected' : ''
            }}>
            {{ $value }}</option>
        @endforeach
    </select>
</div>
<div class="form-grup">
    <label for="phone">Teléfono</label>
    <input type="text" class="form-control" id="phone" name="phone"
        value="{{ old('phone', isset($patient->phone) ? $patient->phone : '') }}"
        placeholder="Ingrese el número de teléfono del paciente" required>
</div>
<div class="form-grup">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" id="address" name="address"
        value="{{ old('address', isset($patient->address) ? $patient->address : '') }}"
        placeholder="Ingrese la dirección del paciente" required>
</div>
<div class="form-grup">
    <label for="city">Ciudad</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Ingrese la cuidad del paciente"
        value="{{ old('city', isset($patient->city) ? $patient->city : '') }}">
</div>
<div class="form-grup">
    <label for="state">Estado</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Ingrese la estado del paciente"
        value="{{ old('state', isset($patient->state) ? $patient->state : '') }}">
</div>
<div class="form-grup">
    <label for="country">Pais</label>
    <input type="text" class="form-control" id="country" name="country" placeholder="Ingrese la pais del paciente"
        value="{{ old('country', isset($patient->country) ? $patient->country : '') }}">
</div>
<div class="form-grup">
    <label for="avatar">Foto</label>
    <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/*" {{ isset($paciente) ? ''
        : '' }}>
</div>
@if (isset($paciente) && $patient->avatar)
<div class="form-grup">
    <label for="current_avatar">Foto actual</label>
    <div>
        <img src="{{ asset('storage/' . $patient->avatar) }}" alt="Foto del paciente" class="img-thumbnail"
            style="max-width: 200px; max-height: 200px;">
    </div>
</div>
@endif
<div class="form-grup">
    <label for="is_active">Estado</label>
    <select class="form-control" id="is_active" name="is_active" required>
        <option value=true {{ old('is_active', isset($patient->is_active) ? $patient->is_active : '') == 'active' ?
            'selected'
            : '' }}>
            Activo</option>
        <option value=false {{ old('is_active', isset($patient->is_active) ? $patient->is_active : '') == 'inactive'
            ?
            'selected' : '' }}>
            Inactivo</option>
    </select>
</div>
<button type="submit" class="btn btn-sm  btn-primary">Guardar</button>
