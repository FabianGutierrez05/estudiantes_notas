<?php

require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use nota\Nota;
use estudianteController\EstudianteController;
$id = empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo = 'Registrar Estudiante';
$urlAction = "accion_registro_estudiante.php";
$estudiante= new Estudiante();

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
            <span>Codigo:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo()?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombres" value="<?php echo $estudiante->getNombre();?>" required>
        </label>
        <br>
        <label>
            <span>Apellido:</span>
            <input type="text" name="apellidos" value="<?php echo $estudiante->getApellido();?>" required>
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>