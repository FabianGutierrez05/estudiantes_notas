<?php
require '../models/estudiante.php';
require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notasController.php';


use nota\Nota;
use notasController\NotasController;


$notas = new Nota();
$notas->setId($_POST['id']);
$notas->setDescripcion($_POST['descripcion']);
$notas->setNota($_POST['nota']);
$notas->setCodEstudiante($_POST['codigo']);

$estudianteController = new NotasController();
$resultado = $estudianteController->create($notas);
if ($resultado) {
    echo '<h1>Nota registrada</h1>';
} else {
    echo '<h1>No se pudo modificar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>