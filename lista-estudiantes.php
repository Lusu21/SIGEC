<?php
include_once 'bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT ID, Nombres, Apellidos, `Cedula Identidad o Estudiantil`, Representante, Telefono FROM lista_estudiantes";
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
                    <a href="index.html">
                        <ion-icon name="desktop-outline"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id = "lista-estudiantes" href="#">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Lista Estudiantes</span>
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

    <!-- Contenido principal (fuera de la barra lateral) -->
    <main class="contenido-principal">
    <!-- Modal para Agregar Estudiante -->
        <div class="modal fade" id="agregar_estudiante" tabindex="-1" aria-labelledby="modalAgregarEstudianteLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarEstudianteLabel">Agregar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarEstudiante">
                    <div class="mb-3">
                        <label for="nombreEstudiante" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombreEstudiante" placeholder="Ingrese el nombre" maxlength="25">
                    </div>
                    <div class="mb-3">
                        <label for="apellidoEstudiante" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidoEstudiante" placeholder="Ingrese el apellido" maxlength="25">
                    </div>
                    <div class="mb-3">
                        <label for="cedulaEstudiante" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedulaEstudiante" placeholder="Ingrese la cédula" maxlength="8">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarEstudiante">Guardar</button>
            </div>
        </div>
    </div>
 </div>  
    <!-- tabla de estudiantes -->
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
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="lista-estudiantes">
                <?php
                foreach($data as $dat) {
                ?>
                <rt>
                    <td><?php echo $dat['ID']; ?></td>
                    <td><?php echo $dat['Nombres']; ?></td>
                    <td><?php echo $dat['Apellidos']; ?></td>
                    <td><?php echo $dat['Cedula Identidad o Estudiantil']; ?></td>
                    <td><?php echo $dat['Representante']; ?></td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
     </div>
    </div>
    
        
    </main>
    <script src="js/datatables.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src= "js/lista_estudiantes.js"></script>
    <script src="js/script.js"></script>
    

</body>
</html>