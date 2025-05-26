<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $consulta = "SELECT * FROM lista_estudiantes WHERE ID = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->execute([$id]);
    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($estudiante);
} else {
    echo json_encode(['error' => 'ID no proporcionado']);
}
?>