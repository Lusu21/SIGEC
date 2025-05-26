<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$query = "";
$salida = array();
$query = "SELECT * FROM lista_estudiantes";

if (isset($_POST["search"]["value"])) {
    $query .= ' WHERE Nombres LIKE "%' . $_POST["search"]["value"] . '%" OR Apellidos LIKE "%' . $_POST["search"]["value"] . '%" OR `Cedula Identidad o Estudiantil` LIKE "%' . $_POST["search"]["value"] . '%" OR Representante LIKE "%' . $_POST["search"]["value"] . '%" OR Telefono LIKE "%' . $_POST["search"]["value"] . '%" OR Sexo LIKE "%' . $_POST["search"]["value"] . '%" OR `Lugar Nacimiento` LIKE "%' . $_POST["search"]["value"] . '%" OR `Entidad Federal` LIKE "%' . $_POST["search"]["value"] . '%" OR Etnia LIKE "%' . $_POST["search"]["value"] . '%" OR `Fecha de Nacimiento` LIKE "%' . $_POST["search"]["value"] . '%" OR Edad LIKE "%' . $_POST["search"]["value"] . '%" OR `Correo Estudiante` LIKE "%' . $_POST["search"]["value"] . '%" OR `Direccion Estudiante` LIKE "%' . $_POST["search"]["value"] . '%" OR `Posee Discapacidad` LIKE "%' . $_POST["search"]["value"] . '%" OR `Carnet Discapacidad` LIKE "%' . $_POST["search"]["value"] . '%" OR `Recibe Apoyo Especial` LIKE "%' . $_POST["search"]["value"] . '%" OR `Recibe Apoyo de Otro Organismo` LIKE "%' . $_POST["search"]["value"] . '%" OR `Recibe Ayuda Tecnica` LIKE "%' . $_POST["search"]["value"] . '%" OR Embarazo LIKE "%' . $_POST["search"]["value"] . '%" OR `Tiene Control` LIKE "%' . $_POST["search"]["value"] . '%" OR `Medico Tratante` LIKE "%' . $_POST["search"]["value"]  .'%"';
}

if (isset($_POST["query"])) {
    $busqueda = $_POST["query"];
    $query .= ' WHERE Nombres LIKE "%' . $busqueda . '%" OR Apellidos LIKE "%' . $busqueda . '%" OR `Cedula Identidad o Estudiantil` LIKE "%' . $busqueda . '%" OR Representante LIKE "%' . $busqueda . '%" OR Telefono LIKE "%' . $busqueda . '%" OR Sexo LIKE "%' . $busqueda . '%" OR `Lugar Nacimiento` LIKE "%' . $busqueda . '%" OR `Entidad Federal` LIKE "%' . $busqueda . '%" OR Etnia LIKE "%' . $busqueda . '%" OR `Fecha de Nacimiento` LIKE "%' . $busqueda . '%" OR Edad LIKE "%' . $busqueda . '%" OR `Correo Estudiante` LIKE "%' . $busqueda . '%" OR `Direccion Estudiante` LIKE "%' . $busqueda . '%" OR `Posee Discapacidad` LIKE "%' . $busqueda . '%" OR `Carnet Discapacidad` LIKE "%' . $busqueda . '%" OR `Recibe Apoyo Especial` LIKE "%' . $busqueda . '%" OR `Recibe Apoyo de Otro Organismo` LIKE "%' . $busqueda . '%" OR `Recibe Ayuda Tecnica` LIKE "%' . $busqueda . '%" OR Embarazo LIKE "%' . $busqueda . '%" OR `Tiene Control` LIKE "%' . $busqueda . '%" OR `Medico Tratante` LIKE "%' . $busqueda . '%" OR `Centro Hospitalario` LIKE "%' . $busqueda . '%" OR Pantalon LIKE "%' . $busqueda . '%" OR Camisa LIKE "%' . $busqueda . '%" OR Zapato LIKE "%' . $busqueda . '%" OR Año LIKE "%' . $busqueda . '%" OR Seccion LIKE "%' . $busqueda . '%" OR `Cedula Representante` LIKE "%' . $busqueda . '%" OR Parentesco LIKE "%' . $busqueda . '%" OR `Autor Autorizado` LIKE "%' . $busqueda  .'%"';
}
$consulta = $conexion->prepare($query);
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

