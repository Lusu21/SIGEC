<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_POST['id'] ?? null;
if (!$id) {
    echo json_encode(['success' => false, 'error' => 'ID no proporcionado']);
    exit;
}

$consulta = "DELETE FROM lista_estudiantes WHERE ID = ?";
$stmt = $conexion->prepare($consulta);
$resultado = $stmt->execute([$id]);

if ($resultado) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->errorInfo()]);
}
?>