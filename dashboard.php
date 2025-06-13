<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <!-- Barra lateral -->
    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="cloud-outline"></ion-icon>
                <span>SIGEC</span>
            </div>
        </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a id ="dashboard" href="dashboard.php">
                        <ion-icon name="desktop-outline"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios.php">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="lista-estudiantes.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Lista Estudiantes</span>
                    </a>    
                </li>
                 <li>
                    <a href="añadir_estudiante.php">
                        <ion-icon name="person-add-outline"></ion-icon>
                        <span>Añadir Estudiante</span>
                    </a>
                </li>
                <li>
                    <a href="materias.php">
                        <ion-icon name="library-outline"></ion-icon>
                        <span>Materias</span>
                    </a>
                </li>
                <li>
                    <a href="profesores.php">
                        <ion-icon name="easel-outline"></ion-icon>
                        <span>Profesores</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="settings-outline"></ion-icon>
                        <span>Configuración</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>
            <div class="usuario">
                <img src="img/liceo.jpg" alt="">
                <div class="info-usuario">
                    <div class="perfil">
                        <span class="perfil">U.E.N <br> Cecrope Segundo Prieto</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal (fuera de la barra lateral) -->
    <main class="contenido-principal">
        <!-- Cards alineados en el dashboard -->
<div class="row">
    <!-- Card Usuarios -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            USUARIOS
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <ion-icon name="people-outline" style="font-size: 3rem; color: #0d6efd;"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Estudiantes -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Estudiantes
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">639</div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <ion-icon name="school-outline" style="font-size: 3rem; color: #198754;"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Materias -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            MATERIAS
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">13</div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <ion-icon name="library-outline" style="font-size: 3rem; color: #20c9e6;"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>