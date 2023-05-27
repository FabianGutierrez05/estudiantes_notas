<?php
require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notasController.php';

use nota\Nota;
use notasController\NotasController;

$nota = new Nota();
$nota->setId($_POST['id']);
$nota->setDescripcion($_POST['descripcion']);
$nota->setNota($_POST['nota']);

$notasController = new NotasController();
$resultado = $notasController->update($nota->getCodigo(), $nota);
if ($resultado) {
    echo '<h1>Nota modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>