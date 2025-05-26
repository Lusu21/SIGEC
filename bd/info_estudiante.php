<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID no proporcionado";
    exit;
}

$consulta = "SELECT * FROM lista_estudiantes WHERE ID = ?";
$stmt = $conexion->prepare($consulta);
$stmt->execute([$id]);
$estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$estudiante) {
    echo "Estudiante no encontrado";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Estudiante</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(230, 230, 230);
        }
        .card {
            background-color: #fff; 
            border: 1px solid #d1d1d1;
            border-radius: 8px;
        }
        .card-body {
            padding: 12px 16px;
        }
        .info-label {
            font-weight: bold;
            color: #333;
        }
        .info-value {
            color: #222;
            word-break: break-all;
        }
        @media print {
            .btn {
                display: none !important;
            }
            h2 {
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
<div class="container my-4 justify-content-center">
    <h2>Información del Estudiante</h2>
    <div class="row">
        <?php foreach($estudiante as $campo => $valor): ?>
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body p-2">
                        <span class="info-label"><?php echo htmlspecialchars($campo); ?>:</span>
                        <span class="info-value"><?php echo htmlspecialchars($valor); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="estudiante_pdf.php?id=<?php echo urlencode($id); ?>" target="_blank" class="btn btn-danger mt-4 me-2">Exportar PDF</a>
    <a href="javascript:window.close();" class="btn btn-secondary mt-4">Cerrar</a>
</div>
</body>
</html>