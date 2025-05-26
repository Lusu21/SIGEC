<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

// Recibe los datos del formulario
$nombres = mb_strtoupper($_POST['Nombres']);
$apellidos = mb_strtoupper($_POST['Apellidos']);
$cedula = mb_strtoupper($_POST['Cedula_Identidad_o_Estudiantil']);
$representante = mb_strtoupper($_POST['Representante']);
$telefono = mb_strtoupper($_POST['Telefono']);
$sexo = mb_strtoupper($_POST['Sexo']);
$lugar_nacimiento = mb_strtoupper($_POST['Lugar_Nacimiento']);
$entidad_federal = mb_strtoupper($_POST['Entidad_Federal']);
$etnia = mb_strtoupper($_POST['Etnia']);
$fecha_nacimiento = $_POST['Fecha_de_Nacimiento'];
$edad = $_POST['Edad'];
$correo_estudiante = mb_strtoupper($_POST['Correo_Estudiante']);
$direccion_estudiante = mb_strtoupper($_POST['Direccion_Estudiante']);
$posee_discapacidad = mb_strtoupper($_POST['Posee_Discapacidad']);
$carnet_discapacidad = mb_strtoupper($_POST['Carnet_Discapacidad']);
$recibe_apoyo_especial = mb_strtoupper($_POST['Recibe_Apoyo_Especial']);
$recibe_apoyo_otro = mb_strtoupper($_POST['Recibe_Apoyo_de_Otro_Organismo']);
$recibe_ayuda_tecnica = mb_strtoupper($_POST['Recibe_Ayuda_Tecnica']);
$embarazo = mb_strtoupper($_POST['Embarazo']);
$tiene_control = mb_strtoupper($_POST['Tiene_Control']);
$medico_tratante = mb_strtoupper($_POST['Medico_Tratante']);
$centro_hospitalario = mb_strtoupper($_POST['Centro_Hospitalario']);
$pantalon = mb_strtoupper($_POST['Pantalon']);
$camisa = mb_strtoupper($_POST['Camisa']);
$zapato = mb_strtoupper($_POST['Zapato']);
$ano = mb_strtoupper($_POST['Año']);
$seccion = mb_strtoupper($_POST['Seccion']);
$cedula_representante = mb_strtoupper($_POST['Cedula_Representante']);
$parentesco = mb_strtoupper($_POST['Parentesco']);
$autor_autorizado = mb_strtoupper($_POST['Autor_Autorizado']);
$correo_representante = mb_strtoupper($_POST['Correo_Representante']);
$direccion_representante = mb_strtoupper($_POST['Direccion_Representante']);

// Prepara la consulta con los nombres exactos de las columnas de tu tabla
$sql = "INSERT INTO lista_estudiantes 
(Nombres, Apellidos, `Cedula Identidad o Estudiantil`, Representante, Telefono, Sexo, `Lugar Nacimiento`, `Entidad Federal`, Etnia, `Fecha de Nacimiento`, Edad, `Correo Estudiante`, `Direccion Estudiante`, `Posee Discapacidad`, `Carnet Discapacidad`, `Recibe Apoyo Especial`, `Recibe Apoyo de Otro Organismo`, `Recibe Ayuda Tecnica`, Embarazo, `Tiene Control`, `Medico Tratante`, `Centro Hospitalario`, Pantalon, Camisa, Zapato, Año, Seccion, `Cedula Representante`, Parentesco, `Autor Autorizado`, `Correo Representante`, `Direccion Representante`)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conexion->prepare($sql);
$result = $stmt->execute([
    $nombres, $apellidos, $cedula, $representante, $telefono, $sexo, $lugar_nacimiento, $entidad_federal, $etnia, $fecha_nacimiento, $edad, $correo_estudiante, $direccion_estudiante, $posee_discapacidad, $carnet_discapacidad, $recibe_apoyo_especial, $recibe_apoyo_otro, $recibe_ayuda_tecnica, $embarazo, $tiene_control, $medico_tratante, $centro_hospitalario, $pantalon, $camisa, $zapato, $ano, $seccion, $cedula_representante, $parentesco, $autor_autorizado, $correo_representante, $direccion_representante
]);

if ($result) {
    header("Location: ../añadir_estudiante.php?exito=1");
    exit();
} else {
    header("Location: ../añadir_estudiante.php?error=1");
    exit();
}
?>