<nav id="nav-primary" class="navbar">
    <button id="nav-btn" type="button" class="btn btn-outline-light btn-lg" data-toggle="collapse" href="#navCollapse" role="button" aria-expanded="false" aria-controls="navCollapse">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse multi-collapse" id="navCollapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php	echo FRONT_ROOT?>Store\ShowListView">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php	echo FRONT_ROOT?>Store\ShowAddViewEstate">Agregar Propiedad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php	echo FRONT_ROOT?>Store\ShowAddVehiculos">Agregar Vehículo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php	echo FRONT_ROOT?>Session\logout">cerrar sesion</a>
            </li>
        </ul>
    </div>
</nav>
