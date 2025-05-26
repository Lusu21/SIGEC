<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        #formEstudiante input,
        #formEstudiante select {
            text-transform: uppercase;
        }
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        .form-container {
            max-width: 1400px;
            margin: 1rem auto;
            padding: 0 15px;
        }
        .compact-card {
            margin-bottom: 0.8rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border-width: 2px;
        }
        .compact-card .card-header {
            padding: 0.6rem 1rem;
            font-size: 0.95rem;
        }
        .compact-card .card-body {
            padding: 0.8rem;
        }
        .form-label {
            font-size: 0.82rem;
            margin-bottom: 0.2rem;
            font-weight: 500;
        }
        .form-control, .form-select {
            padding: 0.35rem 0.7rem;
            font-size: 0.82rem;
            height: calc(1.4em + 0.7rem);
        }
        .btn-sm {
            padding: 0.3rem 0.6rem;
            font-size: 0.85rem;
        }
        .section-title {
            font-size: 1.2rem;
            border-left: 4px solid #0d6efd;
            padding-left: 0.8rem;
            margin: 1.5rem 0 1rem;
            color: #2c3e50;
        }
        .talla-field {
            width: 100%;
            min-width: 100px;
        }
    </style>
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
                    <a href="index.html">
                        <ion-icon name="desktop-outline"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="lista-estudiantes.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Lista Estudiantes</span>
                    </a>
                </li>
                <li>
                    <a id="añadir-estudiante" class="active" href="añadir_estudiante.php">
                        <ion-icon name="person-add-outline"></ion-icon>
                        <span>Añadir Estudiante</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Documentos</span>
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

    <!-- Contenido principal -->
    <main class="contenido-principal">
        <div class="form-container">
            <h5 class="section-title">Registro de Estudiante</h5>
            <form id="formEstudiante" method="POST" action="bd/guardar_estudiante.php">
                <!-- Información Personal -->
                <div class="card compact-card border-primary">
                    <div class="card-header bg-primary text-white py-2">
                        <span class="fw-medium">Información Personal</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Nombres" class="form-label required-field">Nombres</label>
                                <input type="text" maxlength="30" class="form-control form-control-sm" id="Nombres" name="Nombres" required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Apellidos" class="form-label required-field">Apellidos</label>
                                <input type="text" maxlength="30" class="form-control form-control-sm" id="Apellidos" name="Apellidos" required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Cedula_Identidad_o_Estudiantil" class="form-label required-field">Cédula Identidad/Estudiantil</label>
                                <input type="text" maxlength="10" class="form-control form-control-sm" id="Cedula_Identidad_o_Estudiantil" name="Cedula_Identidad_o_Estudiantil" required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Sexo" class="form-label required-field">Sexo</label>
                                <select class="form-select form-select-sm" id="Sexo" name="Sexo" required>
                                    <option value="">SELECCIONAR</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Fecha_de_Nacimiento" class="form-label required-field">Fecha Nacimiento</label>
                                <input type="date" class="form-control form-control-sm" id="Fecha_de_Nacimiento" name="Fecha_de_Nacimiento" required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Edad" class="form-label">Edad</label>
                                <input type="text" maxlength="2" class="form-control form-control-sm" id="Edad" name="Edad">
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Lugar_Nacimiento" class="form-label required-field">Lugar Nacimiento</label>
                                <input type="text" maxlength="20" class="form-control form-control-sm" id="Lugar_Nacimiento" name="Lugar_Nacimiento" required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Entidad_Federal" class="form-label required-field">Entidad Federal</label>
                                <input type="text" maxlength="20" class="form-control form-control-sm" id="Entidad_Federal" name="Entidad_Federal" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="card compact-card border-info">
                    <div class="card-header bg-info text-white py-2">
                        <span class="fw-medium">Información de Contacto</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6 col-md-4">
                                <label for="Correo_Estudiante" class="form-label">Correo Estudiante</label>
                                <input type="email" maxlength="50" class="form-control form-control-sm" id="Correo_Estudiante" name="Correo_Estudiante">
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="text" maxlength="15" class="form-control form-control-sm" id="Telefono" name="Telefono">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="Direccion_Estudiante" class="form-label">Dirección Estudiante</label>
                                <input type="text" maxlength="80" class="form-control form-control-sm" id="Direccion_Estudiante" name="Direccion_Estudiante">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Salud -->
                <div class="card compact-card border-warning">
                    <div class="card-header bg-warning text-dark py-2">
                        <span class="fw-medium">Información de Salud</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Posee_Discapacidad" class="form-label">Posee Discapacidad</label>
                                <select class="form-select form-select-sm" id="Posee_Discapacidad" name="Posee_Discapacidad">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Carnet_Discapacidad" class="form-label">Carnet Discapacidad</label>
                                <input type="text" maxlength="20" class="form-control form-control-sm" id="Carnet_Discapacidad" name="Carnet_Discapacidad">
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Recibe_Apoyo_Especial" class="form-label">Recibe Apoyo Especial</label>
                                <select class="form-select form-select-sm" id="Recibe_Apoyo_Especial" name="Recibe_Apoyo_Especial">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Recibe_Apoyo_de_Otro_Organismo" class="form-label">Recibe Apoyo de Otro Organismo</label>
                                <select class="form-select form-select-sm" id="Recibe_Apoyo_de_Otro_Organismo" name="Recibe_Apoyo_de_Otro_Organismo">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Recibe_Ayuda_Tecnica" class="form-label">Recibe Ayuda Técnica</label>
                                <select class="form-select form-select-sm" id="Recibe_Ayuda_Tecnica" name="Recibe_Ayuda_Tecnica">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Embarazo" class="form-label">Embarazo</label>
                                <select class="form-select form-select-sm" id="Embarazo" name="Embarazo">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Tiene_Control" class="form-label">Tiene Control</label>
                                <select class="form-select form-select-sm" id="Tiene_Control" name="Tiene_Control">
                                    <option value="No">No</option>
                                    <option value="Sí">Sí</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Medico_Tratante" class="form-label">Médico Tratante</label>
                                <input type="text" maxlength="30" class="form-control form-control-sm" id="Medico_Tratante" name="Medico_Tratante">
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Centro_Hospitalario" class="form-label">Centro Hospitalario</label>
                                <input type="text" maxlength="30" class="form-control form-control-sm" id="Centro_Hospitalario" name="Centro_Hospitalario">
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label for="Etnia" class="form-label">Etnia</label>
                                <select class="form-select form-select-sm" id="Etnia" name="Etnia">
                                    <option value="">Seleccionar</option>
                                    <option value="Indígena">Indígena</option>
                                    <option value="Afrodescendiente">Afrodescendiente</option>
                                    <option value="Mestizo">Mestizo</option>
                                    <option value="Blanco">Blanco</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información Escolar -->
                <div class="card compact-card border-success">
                    <div class="card-header bg-success text-white py-2">
                        <span class="fw-medium">Información Escolar</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6 col-md-3 col-lg-2">
                                <label for="Año" class="form-label">Año</label>
                                <select class="form-select form-select-sm" id="Año" name="Año">
                                    <option value="">Seleccionar</option>
                                    <option value="1°">1°</option>
                                    <option value="2°">2°</option>
                                    <option value="3°">3°</option>
                                    <option value="4°">4°</option>
                                    <option value="5°">5°</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <label for="Seccion" class="form-label">Sección</label>
                                <select class="form-select form-select-sm" id="Seccion" name="Seccion">
                                    <option value="">seleccionar</option>
                                </select>
                            </div>
                            <div class="col-4 col-md-2 col-lg-2">
                                <label for="Pantalon" class="form-label">Pantalón</label>
                                <input type="text" maxlength="2" class="form-control form-control-sm talla-field" id="Pantalon" name="Pantalon">
                            </div>
                            <div class="col-4 col-md-2 col-lg-2">
                                <label for="Camisa" class="form-label">Camisa</label>
                                <input type="text" maxlength="2" class="form-control form-control-sm talla-field" id="Camisa" name="Camisa">
                            </div>
                            <div class="col-4 col-md-2 col-lg-2">
                                <label for="Zapato" class="form-label">Zapato</label>
                                <input type="text" maxlength="2" class="form-control form-control-sm talla-field" id="Zapato" name="Zapato">
                            </div>
                            <div class="col-6 col-md-6 col-lg-2">
                                <label for="Representante" class="form-label">Representante</label>
                                <input type="text" maxlength="30" class="form-control form-control-sm" id="Representante" name="Representante">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información del Representante -->
                <div class="card compact-card border-danger">
                    <div class="card-header bg-danger text-white py-2">
                        <span class="fw-medium">Información del Representante</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6 col-md-4">
                                <label for="Cedula_Representante" class="form-label">Cédula Representante</label>
                                <input type="text" maxlength="15" class="form-control form-control-sm" id="Cedula_Representante" name="Cedula_Representante">
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="Parentesco" class="form-label">Parentesco</label>
                                <select class="form-select form-select-sm" id="Parentesco" name="Parentesco">
                                    <option value="">Seleccionar</option>
                                    <option value="MADRE">Madre</option>
                                    <option value="PADRE">Padre</option>
                                    <option value="TUTOR">Tutor</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="Autor_Autorizado" class="form-label">Autor Autorizado</label>
                                <select class="form-select form-select-sm" id="Autor_Autorizado" name="Autor_Autorizado">
                                    <option value="">Seleccionar</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="Correo_Representante" class="form-label">Correo Representante</label>
                                <input type="email" maxlength="50" class="form-control form-control-sm" id="Correo_Representante" name="Correo_Representante">
                            </div>
                            <div class="col-6 col-md-4">
                                <label for="Direccion_Representante" class="form-label">Dirección Representante</label>
                                <input type="text" maxlength="80" class="form-control form-control-sm" id="Direccion_Representante" name="Direccion_Representante">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="reset" class="btn btn-outline-secondary btn-sm">Limpiar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Guardar Registro</button>
                </div>
            </form>
        </div>
    </main>
    <script src="js/sweetalert2.all.min.js"></script>    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
const seccionesPorAno = {
    "1°": ["A", "B", "C"],
    "2°": ["A", "B", "C"],
    "3°": ["A", "B"],
    "4°": ["A", "B"],
    "5°": ["A", "B"]
};

document.getElementById('Año').addEventListener('change', function() {
    const ano = this.value;
    const seccionSelect = document.getElementById('Seccion');
    seccionSelect.innerHTML = '<option value="">sección</option>';
    if (seccionesPorAno[ano]) {
        seccionesPorAno[ano].forEach(function(sec) {
            const opt = document.createElement('option');
            opt.value = sec;
            opt.textContent = sec;
            seccionSelect.appendChild(opt);
        });
    }
});
document.getElementById('Cedula_Identidad_o_Estudiantil').addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
document.getElementById('Edad').addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
document.getElementById('Telefono').addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
document.getElementById('Camisa').addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
document.getElementById('Zapato').addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
</script>

<?php if (isset($_GET['exito'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: '¡Registrado!',
    text: 'El estudiante fue registrado correctamente',
    confirmButtonText: 'Aceptar'
});
</script>
<?php elseif (isset($_GET['error'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No se pudo registrar el estudiante',
    confirmButtonText: 'Aceptar'
});
</script>
<?php endif; ?>

</body>
</html>