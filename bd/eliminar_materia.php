<?php
include_once '../bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_POST['id'];

$sql = "DELETE FROM lista_materias WHERE id = ?";
$query = $conexion->prepare($sql);
$result = $query->execute([$id]);

echo json_encode(['success' => $result]);
?>