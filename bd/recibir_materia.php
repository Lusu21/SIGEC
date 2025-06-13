<?php
include_once '../bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $consulta = "SELECT * FROM lista_materias WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->execute([$id]);
    $materia = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($materia);
} else {
    echo json_encode(['error' => 'ID no proporcionado']);
}
?>