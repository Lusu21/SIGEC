<?php
require_once __DIR__ . '/../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID no proporcionado');
}

$consulta = "SELECT * FROM lista_estudiantes WHERE ID = ?";
$stmt = $conexion->prepare($consulta);
$stmt->execute([$id]);
$estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$estudiante) {
    die('Estudiante no encontrado');
}

// Prepara el HTML para el PDF
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Estudiante</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #bbb; padding: 8px 10px; }
        th { background: #e6e6e6; text-align: left; }
        tr:nth-child(even) { background: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Información del Estudiante</h2>
    <table>
        <tbody>';
foreach($estudiante as $campo => $valor){
    $html .= '<tr>
                <th>'.htmlspecialchars($campo).'</th>
                <td>'.htmlspecialchars($valor).'</td>
              </tr>';
}
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Genera el PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('estudiante_'.$id.'.pdf', ['Attachment' => false]);
exit;
?>