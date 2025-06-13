<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$nombre_materia = $_POST['nombre_materia'];
$estado = $_POST['estado'];

$sql = "INSERT INTO lista_materias (nombre_materia, estado) VALUES (?, ?)";
$query = $conexion->prepare($sql);
$result = $query->execute([$nombre_materia, $estado]);

echo json_encode(['success' => $result]);
?>