<?php
include_once 'bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT id, nombre_materia, estado FROM lista_materias";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEC</title>
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
                    <a id="materias" href="materias.php">
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
    <div class="form-container">
        <h1 class="section-title">Lista de Materias</h1>
        <button type="button" class="btn btn-secondary" id="btnNuevaMateria" data-bs-toggle="modal" data-bs-target="#modalNuevaMateria">
            Nueva Materia
        </button>
        <div class="container my-5">
            <div class="row">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de la Materia</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id ="lista-materias">
                        <?php foreach ($data as $dat): ?>
                            <tr>
                                <td><?php echo $dat['id']; ?></td>
                                <td><?php echo $dat['nombre_materia']; ?></td>
                                
                                <td>
                                    <?php if ($dat['estado'] == 1): ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">No Activo</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                      <button type="button" class="btn btn-primary btn-sm editar-materia" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditarMateria"
                                        data-id="<?php echo $dat['id']; ?>">
                                        <ion-icon name="create-outline"></ion-icon>
                                      </button>
                                      <button type="button" class="btn btn-danger btn-sm eliminar-materia" data-id="<?php echo $dat['id']; ?>">
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

    <!-- Modal Nueva materia -->
    <div class="modal fade" id="modalNuevaMateria" tabindex="-1" aria-labelledby="modalNuevaMateriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formNuevaMateria" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaMateriaLabel">Nueva Materia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreMateria" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombreMateria" name="nombre_materia" required>
          </div>
          <div class="mb-3">
            <label for="estadoMateria" class="form-label">Estado</label>
            <select class="form-select" id="estadoMateria" name="estado" required>
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

<!-- Modal editar materia -->
    <div class="modal fade" id="modalEditarMateria" tabindex="-1" aria-labelledby="modalEditarMateriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditarMateria" method="POST">
        <input type="hidden" id="editarIdMateria" name="id">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarMateriaLabel">Editar Materia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreMateria" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="editarnombreMateria" name="nombre_materia" required>
          </div>
          <div class="mb-3">
            <label for="estadoMateria" class="form-label">Estado</label>
            <select class="form-select" id="editarEstadoMateria" name="estado" required>
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
        
</main>
    
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/sweetalert2.all.min.js"></script> 
    <script src="js/lista_materias.js"></script>  
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>