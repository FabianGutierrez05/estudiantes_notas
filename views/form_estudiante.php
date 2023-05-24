<?php

require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;
$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Registrar Estudiante';
$urlAction = "accion_registro_estudiante.php";
$usuario= new Estudiante();
if(!empty($id)) {
    $titulo = 'Modificar Estudiante';
    $urlAction = "accion_modificar_estudiante.php";
    $estudianteController = new EstudianteController();
    $estudiante=$estudianteController->readRow($id);
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
            <span>Codigo:</span>
            <input type="number" name="id" min="1" value="<?php echo $estudiante->getId()?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="name" value="<?php echo $estudiante->getNombre();?>" required>
        </label>
        <br>
        <label>
            <span>Apellido:</span>
            <input type="text" name="username" value="<?php echo $estudiante->getApellido();?>" required>
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>