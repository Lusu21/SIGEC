<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$clave = $_POST['clave'];
$informacion = $_POST['informacion'];
$estado = $_POST['estado'];

$sql = "UPDATE lista_profesores SET nombre=?, materia=?, clave=?, informacion=?, estado=? WHERE id=?";
$query = $conexion->prepare($sql);
$result = $query->execute([$nombre, $materia, $clave, $informacion, $estado, $id]);

echo json_encode(['success' => $result]);
?>
