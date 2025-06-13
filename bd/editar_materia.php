<?php
include_once '../bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_POST['id'];
$nombre_materia = $_POST['nombre_materia'];
$estado = $_POST['estado'];

$sql = "UPDATE lista_materias SET nombre_materia = ?, estado = ? WHERE id = ?";
$query = $conexion->prepare($sql);
$result = $query->execute([$nombre_materia, $estado, $id]);

echo json_encode(['success' => $result]);
?>