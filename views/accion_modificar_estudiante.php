<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setId($_POST['id']);
$estudiante->setNombre($_POST['nombre']);
$estudiante->setApellido($_POST['apellido']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($estudiante->getId(), $estudiante);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>