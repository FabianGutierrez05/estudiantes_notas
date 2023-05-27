<?php
require 'models/notas.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/notasController.php';

use nota\Nota;
use notasController\NotasController;
$codigo = $_GET['codigo'];

$estudianteController = new NotasController();

$notas = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de notas</h1>
        <a href="views/form_nota.php?codigo=<?php echo $codigo; ?>">Registrar Notas</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Actividad</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($notas as $nota) {
                    echo '<tr>';
                    echo '  <td>' . $nota->getId() . '</td>';
                    echo '  <td>' . $nota->getDescripcion() . '</td>';
                    echo '  <td>' . $nota->getNota() . '</td>';
                    echo '  <td>' . $nota->getCodEstudiante(). '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $nota->getCodEstudiante() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_notas.php?id=' . $nota->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>