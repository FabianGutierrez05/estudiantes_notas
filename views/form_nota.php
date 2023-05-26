<?php

require '../models/notas.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notasController.php';

use nota\Nota;
use notasController\NotasController;
$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Registrar Nota';
$urlAction = "accion_registrar_notas.php";
$nota= new Nota();
if(!empty($id)) {
    $titulo = 'Modificar Nota';
    $urlAction = "accion_modificar_estudiante.php";
    $notasController = new NotaController();
    $nota=$notasController->readRow($id);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $nota->getId()?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $nota->getDescripcion();?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="apellidos" value="<?php echo $nota->getNota();?>" required>
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>