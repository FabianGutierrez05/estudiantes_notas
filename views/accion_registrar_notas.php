<?php
require '../models/estudiante.php';
require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;
use nota\Nota;

$notas = new Nota();
$notas->setId($_POST['id']);
$notas->setDescripcion($_POST['descripcion']);
$notas->setNota($_POST['nota']);


$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($notas);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>