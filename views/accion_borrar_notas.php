<?php
require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notasController.php';

use notasController\NotasController;

$notasController = new NotasController();
$resultado = $notasController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>Nota borrada</h1>';
} else {
    echo '<h1>No se pudo borrar la nota</h1>';
}
