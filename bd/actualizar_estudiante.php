<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$id = $_POST['ID'] ?? null;
$nombres = $_POST['Nombres'] ?? '';
$apellidos = $_POST['Apellidos'] ?? '';
$cedula = $_POST['Cedula_Identidad_o_Estudiantil'] ?? '';
$representante = $_POST['Representante'] ?? '';
$telefono = $_POST['Telefono'] ?? '';
$sexo = $_POST['Sexo'] ?? '';
$lugar_nacimiento = $_POST['Lugar_Nacimiento'] ?? '';
$entidad_federal = $_POST['Entidad_Federal'] ?? '';
$etnia = $_POST['Etnia'] ?? '';
$fecha_nacimiento = $_POST['Fecha_de_Nacimiento'] ?? '';
$edad = $_POST['Edad'] ?? '';
$correo_estudiante = $_POST['Correo_Estudiante'] ?? '';
$direccion_estudiante = $_POST['Direccion_Estudiante'] ?? '';
$posee_discapacidad = $_POST['Posee_Discapacidad'] ?? '';
$carnet_discapacidad = $_POST['Carnet_Discapacidad'] ?? '';
$recibe_apoyo_especial = $_POST['Recibe_Apoyo_Especial'] ?? '';
$recibe_apoyo_otro = $_POST['Recibe_Apoyo_de_Otro_Organismo'] ?? '';
$recibe_ayuda_tecnica = $_POST['Recibe_Ayuda_Tecnica'] ?? '';
$embarazo = $_POST['Embarazo'] ?? '';
$tiene_control = $_POST['Tiene_Control'] ?? '';
$medico_tratante = $_POST['Medico_Tratante'] ?? '';
$centro_hospitalario = $_POST['Centro_Hospitalario'] ?? '';
$pantalon = $_POST['Pantalon'] ?? '';
$camisa = $_POST['Camisa'] ?? '';
$zapato = $_POST['Zapato'] ?? '';
$ano = $_POST['Año'] ?? '';
$seccion = $_POST['Seccion'] ?? '';
$cedula_representante = $_POST['Cedula_Representante'] ?? '';
$parentesco = $_POST['Parentesco'] ?? '';
$autor_autorizado = $_POST['Autor_Autorizado'] ?? '';
$correo_representante = $_POST['Correo_Representante'] ?? '';
$direccion_representante = $_POST['Direccion_Representante'] ?? '';

if ($id) {
    $consulta = "UPDATE lista_estudiantes SET 
        Nombres=?, Apellidos=?, `Cedula Identidad o Estudiantil`=?, Representante=?, Telefono=?, Sexo=?, `Lugar Nacimiento`=?, `Entidad Federal`=?, Etnia=?, `Fecha de Nacimiento`=?, Edad=?, `Correo Estudiante`=?, `Direccion Estudiante`=?, `Posee Discapacidad`=?, `Carnet Discapacidad`=?, `Recibe Apoyo Especial`=?, `Recibe Apoyo de Otro Organismo`=?, `Recibe Ayuda Tecnica`=?, Embarazo=?, `Tiene Control`=?, `Medico Tratante`=?, `Centro Hospitalario`=?, Pantalon=?, Camisa=?, Zapato=?, Año=?, Seccion=?, `Cedula Representante`=?, Parentesco=?, `Autor Autorizado`=?, `Correo Representante`=?, `Direccion Representante`=? 
        WHERE ID=?";
    $stmt = $conexion->prepare($consulta);
    $resultado = $stmt->execute([
        $nombres, $apellidos, $cedula, $representante, $telefono, $sexo, $lugar_nacimiento, $entidad_federal, $etnia, $fecha_nacimiento, $edad, $correo_estudiante, $direccion_estudiante, $posee_discapacidad, $carnet_discapacidad, $recibe_apoyo_especial, $recibe_apoyo_otro, $recibe_ayuda_tecnica, $embarazo, $tiene_control, $medico_tratante, $centro_hospitalario, $pantalon, $camisa, $zapato, $ano, $seccion, $cedula_representante, $parentesco, $autor_autorizado, $correo_representante, $direccion_representante, $id
    ]);
    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->errorInfo()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID no proporcionado']);
}
?>