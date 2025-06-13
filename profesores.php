<?php
include_once 'bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT id, nombre, materia, clave, informacion, estado FROM lista_profesores";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$consultaMaterias = "SELECT nombre_materia FROM lista_materias";
$resultadoMaterias = $conexion->prepare($consultaMaterias);
$resultadoMaterias->execute();
$materias = $resultadoMaterias->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Profesores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .section-title {
            font-size: 1.5rem;
            border-left: 4px solid #0d6efd;
            padding-left: 0.8rem;
            margin: 3rem 0 1rem;
            color: #2c3e50;
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
                    <a id="profesores" href="profesores.php">
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
    <div class="form-container">
        <h1 class="section-title">Lista de Profesores</h1>
        <button type="button" class="btn btn-secondary" id="btnNuevoProfesor" data-bs-toggle="modal" data-bs-target="#modalNuevoProfesor">
            Nuevo Profesor
        </button>
        <div class="container my-5">
            <div class="row">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Materia</th>
                            <th>Información Académica</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id ="lista-profesores">
                        <?php foreach ($data as $dat): ?>
                            <tr>
                                <td><?php echo $dat['id']; ?></td>
                                <td><?php echo $dat['nombre']; ?></td>
                                <td><?php echo $dat['materia']; ?></td>
                                <td><?php echo $dat['informacion']; ?></td>
                                <td>
                                    <?php if ($dat['estado'] == 1): ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">No Activo</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                      <button type="button" class="btn btn-primary btn-sm editar-profesor" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#editarProfesorModal"
                                        data-id="<?php echo $dat['id']; ?>">
                                        <ion-icon name="create-outline"></ion-icon>
                                      </button>
                                      <button type="button" class="btn btn-danger btn-sm eliminar-profesor" data-id="<?php echo $dat['id']; ?>">
                                        <ion-icon name="trash-outline"></ion-icon>
                                      </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

    <!-- Modal Nuevo Profesor -->
    <div class="modal fade" id="modalNuevoProfesor" tabindex="-1" aria-labelledby="modalNuevoProfesorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formNuevoProfesor" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevoProfesorLabel">Nuevo Profesor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreProfesor" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreProfesor" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="materiaProfesor" class="form-label">Materia</label>
            <select class="form-select" id="materiaProfesor" name="materia" required>
                <option value="">Seleccione una Materia</option>
                <?php foreach($materias as $mat): ?>
                    <option value="<?php echo htmlspecialchars($mat['nombre_materia']); ?>">
                        <?php echo htmlspecialchars($mat['nombre_materia']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="claveProfesor" class="form-label">Clave</label>
            <input type="text" class="form-control" id="claveProfesor" name="clave" required>
          </div>
          <div class="mb-3">
            <label for="informacionProfesor" class="form-label">Información Academica</label>
            <input type="text" class="form-control" id="informacionProfesor" name="informacion" required>
          </div>
          <div class="mb-3">
            <label for="estadoProfesor" class="form-label">Estado</label>
            <select class="form-select" id="estadoProfesor" name="estado" required>
              <option value="1">Activo</option>
              <option value="0">No Activo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Modal Editar Profesor -->
    <div class="modal fade" id="editarProfesorModal" tabindex="-1" aria-labelledby="editarProfesorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditarProfesor" method="POST">
        <input type="hidden" id="idProfesorEditar" name="id">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevoProfesorLabel">Editar Profesor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreProfesor" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreProfesorEditar" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="materiaProfesor" class="form-label">Materia</label>
            <select class="form-select" id="materiaProfesorEditar" name="materia" required>
             <option value="">Seleccione una Materia</option>
                <?php foreach($materias as $mat): ?>
                    <option value="<?php echo htmlspecialchars($mat['nombre_materia']); ?>">
                        <?php echo htmlspecialchars($mat['nombre_materia']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="claveProfesor" class="form-label">Clave</label>
            <input type="text" class="form-control" id="claveProfesorEditar" name="clave" required>
          </div>
          <div class="mb-3">
            <label for="informacionProfesor" class="form-label">Información Académica</label>
            <input type="text" class="form-control" id="informacionProfesorEditar" name="informacion" required>
          </div>
          <div class="mb-3">
            <label for="estadoProfesor" class="form-label">Estado</label>
            <select class="form-select" id="estadoProfesorEditar" name="estado" required>
              <option value="1">Activo</option>
              <option value="0">No Activo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/sweetalert2.all.min.js"></script> 
    <script src="js/lista_profesores.js"></script>  
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>