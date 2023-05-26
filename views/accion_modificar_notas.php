<?php
require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notasController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$estudiante->setApellido($_POST['apellidos']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($estudiante->getCodigo(), $estudiante);
if ($resultado) {
    echo '<h1>Estudiante modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>