<?php
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/form_estudiante.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombre() . '</td>';
                    echo '  <td>' . $estudiante->getApellido() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $estudiante->getCodigo() . '"></a>';
                    echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">borrar</a>';
                    echo '      <a href="notasIndex.php?codigo=' . $estudiante->getCodigo() . '">Notas del estudiante</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>