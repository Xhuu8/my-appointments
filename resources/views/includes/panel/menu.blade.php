<!-- Form loguot -->
<form class="mt-4 mb-3 d-md-none">
    <div class="input-group input-group-rounded input-group-merge">
        <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search"
            aria-label="Search">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <span class="fa fa-search"></span>
            </div>
        </div>
    </div>
</form>
<!-- Navigation -->

@if (auth()->user()->isRole() == 'admin')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('specialties.index') }}">
            <i class="ni ni-planet text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctors.index') }}">
            <i class="ni ni-single-02 text-orange"></i> Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('patients.index') }}">
            <i class="ni ni-satisfied text-yellow"></i> Pacientes
        </a>
    </li>

</ul>

<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Documentation</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-collection text-green"></i> Frecuencia de citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-spaceship text-blue "></i> Medicos más activos
        </a>
    </li>
</ul>
@endif

@if (auth()->user()->isRole() == 'doctor')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Gestionar horarios
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('specialties.index') }}">
            <i class="ni ni-planet text-blue"></i> mis citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctors.index') }}">
            <i class="ni ni-single-02 text-orange"></i> mis pacientes
        </a>
    </li>
</ul>
@endif


@if (auth()->user()->isRole() == 'patient')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('specialties.index') }}">
            <i class="ni ni-planet text-blue"></i> Agendar cita
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctors.index') }}">
            <i class="ni ni-single-02 text-orange"></i> Mis citas
        </a>
    </li>
</ul>
@endif
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="ni ni-user-run text-red"></i> Logout
        </a>
    </li>
</ul>