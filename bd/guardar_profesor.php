<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$clave = $_POST['clave'];
$informacion = $_POST['informacion'];
$estado = $_POST['estado'];

$sql = "INSERT INTO lista_profesores (nombre, materia, clave, informacion, estado) VALUES (?, ?, ?, ?, ?)";
$query = $conexion->prepare($sql);
$result = $query->execute([$nombre, $materia, $clave, $informacion, $estado]);

echo json_encode(['success' => $result]);
?>
