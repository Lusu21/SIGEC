<?php
include_once 'bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT ID, Nombres, Apellidos, `Cedula Identidad o Estudiantil`, Representante, Telefono, Sexo, `Lugar Nacimiento`, `Entidad Federal`, Etnia, `Fecha de Nacimiento`, Edad, `Correo Estudiante`, `Direccion Estudiante`, `Posee Discapacidad`, `Carnet Discapacidad`, `Recibe Apoyo Especial`, `Recibe Apoyo de Otro Organismo`, `Recibe Ayuda Tecnica`, Embarazo, `Tiene Control`, `Medico Tratante`, `Centro Hospitalario`, Pantalon, Camisa, Zapato, Año, Seccion, `Cedula Representante`, Parentesco, `Autor Autorizado`, `Correo Representante`, `Direccion Representante` FROM lista_estudiantes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Estudiantes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.css" rel="stylesheet">
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
                    <a href="dashboard.php">
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
                    <a id="lista-estudiantes" href="lista-estudiantes.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Lista Estudiantes</span>
                    </a>
                </li>
                <li>
                    <a id="añadir_estudiante" href="añadir_estudiante.php">
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
        <div class="container my-5">
            <div class="row">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Representante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="lista-estudiantes">
                        <?php foreach($data as $dat) { ?>
                        <tr>
                            <td><?php echo $dat['ID']; ?></td>
                            <td><?php echo $dat['Nombres']; ?></td>
                            <td><?php echo $dat['Apellidos']; ?></td>
                            <td><?php echo $dat['Cedula Identidad o Estudiantil']; ?></td>
                            <td><?php echo $dat['Representante']; ?></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-warning btn-sm editar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"
                                        data-id="<?php echo $dat['ID']; ?>">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <a class="btn btn-info btn-sm info" target="_blank" href="bd/info_estudiante.php?id=<?php echo $dat['ID']; ?>">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm eliminar" data-id="<?php echo $dat['ID']; ?>">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Editar Estudiante -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form id="formEditar" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Editar Estudiante</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body row">
                            <input type="hidden" id="ID" name="ID">
                            <div class="mb-3 col-md-6">
                                <label for="Nombres" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="Nombres" name="Nombres">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="Apellidos" name="Apellidos">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Cedula_Identidad_o_Estudiantil" class="form-label">Cédula Identidad o Estudiantil</label>
                                <input type="text" class="form-control" id="Cedula_Identidad_o_Estudiantil" name="Cedula_Identidad_o_Estudiantil">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Representante" class="form-label">Representante</label>
                                <input type="text" class="form-control" id="Representante" name="Representante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="Telefono" name="Telefono">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Sexo" class="form-label">Sexo</label>
                                <input type="text" class="form-control" id="Sexo" name="Sexo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Lugar_Nacimiento" class="form-label">Lugar Nacimiento</label>
                                <input type="text" class="form-control" id="Lugar_Nacimiento" name="Lugar_Nacimiento">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Entidad_Federal" class="form-label">Entidad Federal</label>
                                <input type="text" class="form-control" id="Entidad_Federal" name="Entidad_Federal">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Etnia" class="form-label">Etnia</label>
                                <input type="text" class="form-control" id="Etnia" name="Etnia">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Fecha_de_Nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="Fecha_de_Nacimiento" name="Fecha_de_Nacimiento">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Edad" class="form-label">Edad</label>
                                <input type="number" class="form-control" id="Edad" name="Edad">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Correo_Estudiante" class="form-label">Correo Estudiante</label>
                                <input type="email" class="form-control" id="Correo_Estudiante" name="Correo_Estudiante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Direccion_Estudiante" class="form-label">Dirección Estudiante</label>
                                <input type="text" class="form-control" id="Direccion_Estudiante" name="Direccion_Estudiante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Posee_Discapacidad" class="form-label">Posee Discapacidad</label>
                                <input type="text" class="form-control" id="Posee_Discapacidad" name="Posee_Discapacidad">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Carnet_Discapacidad" class="form-label">Carnet Discapacidad</label>
                                <input type="text" class="form-control" id="Carnet_Discapacidad" name="Carnet_Discapacidad">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Recibe_Apoyo_Especial" class="form-label">Recibe Apoyo Especial</label>
                                <input type="text" class="form-control" id="Recibe_Apoyo_Especial" name="Recibe_Apoyo_Especial">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Recibe_Apoyo_de_Otro_Organismo" class="form-label">Recibe Apoyo de Otro Organismo</label>
                                <input type="text" class="form-control" id="Recibe_Apoyo_de_Otro_Organismo" name="Recibe_Apoyo_de_Otro_Organismo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Recibe_Ayuda_Tecnica" class="form-label">Recibe Ayuda Técnica</label>
                                <input type="text" class="form-control" id="Recibe_Ayuda_Tecnica" name="Recibe_Ayuda_Tecnica">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Embarazo" class="form-label">Embarazo</label>
                                <input type="text" class="form-control" id="Embarazo" name="Embarazo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Tiene_Control" class="form-label">Tiene Control</label>
                                <input type="text" class="form-control" id="Tiene_Control" name="Tiene_Control">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Medico_Tratante" class="form-label">Médico Tratante</label>
                                <input type="text" class="form-control" id="Medico_Tratante" name="Medico_Tratante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Centro_Hospitalario" class="form-label">Centro Hospitalario</label>
                                <input type="text" class="form-control" id="Centro_Hospitalario" name="Centro_Hospitalario">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Pantalon" class="form-label">Pantalón</label>
                                <input type="text" class="form-control" id="Pantalon" name="Pantalon">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Camisa" class="form-label">Camisa</label>
                                <input type="text" class="form-control" id="Camisa" name="Camisa">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Zapato" class="form-label">Zapato</label>
                                <input type="text" class="form-control" id="Zapato" name="Zapato">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Año" class="form-label">Año</label>
                                <input type="text" class="form-control" id="Año" name="Año">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Seccion" class="form-label">Sección</label>
                                <input type="text" class="form-control" id="Seccion" name="Seccion">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Cedula_Representante" class="form-label">Cédula Representante</label>
                                <input type="text" class="form-control" id="Cedula_Representante" name="Cedula_Representante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Parentesco" class="form-label">Parentesco</label>
                                <input type="text" class="form-control" id="Parentesco" name="Parentesco">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Autor_Autorizado" class="form-label">Autor Autorizado</label>
                                <input type="text" class="form-control" id="Autor_Autorizado" name="Autor_Autorizado">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Correo_Representante" class="form-label">Correo Representante</label>
                                <input type="email" class="form-control" id="Correo_Representante" name="Correo_Representante">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Direccion_Representante" class="form-label">Dirección Representante</label>
                                <input type="text" class="form-control" id="Direccion_Representante" name="Direccion_Representante">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/sweetalert2.all.min.js"></script> 
    <script src="js/lista_estudiantes.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>