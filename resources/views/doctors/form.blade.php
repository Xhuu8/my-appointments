<div class="form-grup">
    <label for="name">Nombre del doctor</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', isset($doctor->name) ? $doctor->name : '') }}" placeholder="Ingrese el nombre del doctor"
        required>
</div>
<div class="form-grup">
    <label for="identification">CURP o DNI</label>
    <input type="text" class="form-control" id="identification" name="identification"
        placeholder="Ingrese la identificacion del doctor"
        value="{{ old('identification', isset($doctor->identification) ? $doctor->identification : '') }}">
</div>
<div class="form-grup">
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ old('email', isset($doctor->email) ? $doctor->email : '') }}"
        placeholder="Ingrese el correo electrónico del doctor" required>
</div>
<div class="form-grup">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password"
        placeholder="Ingrese la contraseña del doctor">
</div>
<div class="form-grup">
    <label for="password_confirmation">Confirmar contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="Confirme la contraseña del doctor">
</div>
<div class="form-grup">
    <label for="role">Rol</label>
    <select class="form-control" id="role" name="role" required>
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $key => $value)
        <option value="{{ $key }}" {{ old('role', isset($doctor->role) ? $doctor->role : '') == $key ? 'selected' : ''
            }}>
            {{ $value }}</option>
        @endforeach
    </select>
</div>
<div class="form-grup">
    <label for="phone">Teléfono</label>
    <input type="text" class="form-control" id="phone" name="phone"
        value="{{ old('phone', isset($doctor->phone) ? $doctor->phone : '') }}"
        placeholder="Ingrese el número de teléfono del doctor" required>
</div>
<div class="form-grup">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" id="address" name="address"
        value="{{ old('address', isset($doctor->address) ? $doctor->address : '') }}"
        placeholder="Ingrese la dirección del doctor" required>
</div>
<div class="form-grup">
    <label for="city">Ciudad</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Ingrese la cuidad del doctor"
        value="{{ old('city', isset($doctor->city) ? $doctor->city : '') }}">
</div>
<div class="form-grup">
    <label for="state">Estado</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Ingrese la estado del doctor"
        value="{{ old('state', isset($doctor->state) ? $doctor->state : '') }}">
</div>
<div class="form-grup">
    <label for="country">Pais</label>
    <input type="text" class="form-control" id="country" name="country" placeholder="Ingrese la pais del doctor"
        value="{{ old('country', isset($doctor->country) ? $doctor->country : '') }}">
</div>
<div class="form-grup">
    <label for="avatar">Foto</label>
    <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/*" {{ isset($doctor) ? '' : ''
        }}>
</div>
@if (isset($doctor) && $doctor->avatar)
<div class="form-grup">
    <label for="current_avatar">Foto actual</label>
    <div>
        <img src="{{ asset('storage/' . $doctor->avatar) }}" alt="Foto del doctor" class="img-thumbnail"
            style="max-width: 200px; max-height: 200px;">
    </div>
</div>
@endif
<div class="form-grup">
    <label for="is_active">Estado</label>
    <select class="form-control" id="is_active" name="is_active" required>
        <option value=true {{ old('is_active', isset($doctor->is_active) ? $doctor->is_active : '') == 'active' ?
            'selected'
            : '' }}>
            Activo</option>
        <option value=false {{ old('is_active', isset($doctor->is_active) ? $doctor->is_active : '') == 'inactive'
            ?
            'selected' : '' }}>
            Inactivo</option>
    </select>
</div>
<div class="form-grup">
    <label for="is_active">Especialidades</label>
    <select name="specialties[]" id="specialties" class="form-control selectpicker" multiple data-style="btn-default"
        title="secciona una o mas">
        @foreach ($specialties as $specialty)

        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-grup">

    <button type="submit" class="btn btn-sm  btn-primary mt-3">Guardar</button>
</div>