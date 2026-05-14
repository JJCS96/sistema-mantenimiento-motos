<!-- 
|--------------------------------------------------------------------------
| Sidebar principal
|--------------------------------------------------------------------------
-->

<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sidebar">

    <!-- Logo -->
    <a 
        href="<?php echo BASE_URL; ?>views/dashboard.php"
        class="d-flex align-items-center mb-4 text-white text-decoration-none"
    >

        <i class="bi bi-bicycle fs-2 me-2"></i>

        <span class="fs-4 fw-bold">
            MotoSystem
        </span>

    </a>

    <hr>

    <!-- Menú -->
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item mb-2">

            <a 
                href="<?php echo BASE_URL; ?>views/dashboard.php"
                class="nav-link text-white"
            >

                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard

            </a>

        </li>

        <li class="mb-2">

            <a 
                href="<?php echo BASE_URL; ?>views/clientes/index.php"
                class="nav-link text-white"
            >

                <i class="bi bi-people-fill me-2"></i>
                Clientes

            </a>

        </li>

        <li class="mb-2">

            <a 
                href="<?php echo BASE_URL; ?>views/motos/index.php"
                class="nav-link text-white"
            >

                <i class="bi bi-bicycle me-2"></i>
                Motos

            </a>

        </li>

<!-- Mantenimientos -->
<li class="mb-2">

    <a 
        href="<?php echo BASE_URL; ?>views/mantenimientos/index.php"
        class="nav-link text-white"
    >

        <i class="bi bi-tools me-2"></i>

        Mantenimientos

    </a>

</li>

        <li class="mb-2">

            <a href="#" class="nav-link text-white">

                <i class="bi bi-box-seam me-2"></i>
                Repuestos

            </a>

        </li>

        <li class="mb-2">

            <a href="#" class="nav-link text-white">

                <i class="bi bi-bar-chart-fill me-2"></i>
                Reportes

            </a>

        </li>

    </ul>

    <hr>

    <!-- Usuario -->
    <div class="dropdown">

        <a 
            href="#"
            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown"
        >

            <i class="bi bi-person-circle fs-4 me-2"></i>

            <strong>
                <?php echo $_SESSION["nombre"]; ?>
            </strong>

        </a>

        <ul class="dropdown-menu dropdown-menu-dark shadow">

            <li>

                <a 
                    class="dropdown-item"
                    href="<?php echo BASE_URL; ?>controllers/AuthController.php?action=logout"
                >
                    Cerrar sesión
                </a>

            </li>

        </ul>

    </div>

</div>