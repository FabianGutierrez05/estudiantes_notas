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
    <style>
    
    body {
    
    margin: 0;
    padding: 0;
    background-color: rgb(254, 250, 250);
}

main {
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th,
td {
    padding: 8px;
    border: 1px solid;
    text-align: left;

}

th {
    background-color: #f2f2f2;
}

a {
    margin-right: 10px;
} </style>
    
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