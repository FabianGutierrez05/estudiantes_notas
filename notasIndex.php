<?php
require 'models/notas.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/notasController.php';

use nota\Nota;
use notasController\NotasController;
$codigo = $_GET['codigo'];

$estudianteController = new NotasController();

$notas = $estudianteController->read($codigo);
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
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            margin-right: 10px;
        }

        h3 {
            margin-top: 20px;
            font-size: 18px;
        }

        h1.green {
            color: green;
        }

        h1.red {
            color: red;
        }
    </style>
</head>

<body>
    <main>
        <h1>Lista de notas del estudiante</h1>
        <a href="views/form_nota.php?codigo=<?php echo $codigo; ?>">Registrar Notas</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prom=0;
                $denom=0;
                $sumNotas=0;
                foreach ($notas as $nota) {
                    $denom=1+$denom;
                    echo '<tr>';
                    echo '  <td>' . $nota->getId() . '</td>';
                    echo '  <td>' . $nota->getDescripcion() . '</td>';
                    echo '  <td>' . $nota->getNota() . '</td>';
                    echo '  <td>' . $nota->getCodEstudiante(). '</td>';
                    echo '  <td>';
                    $sumNotas=$nota->getNota()+$sumNotas;
                    $prom= $sumNotas/$denom;
                    echo '      <a href="views/form_nota.php?id=' . $nota->getId() . '">modificar</a>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $nota->getCodEstudiante() . '"></a>';
                    echo '      <a href="views/accion_borrar_notas.php?id=' . $nota->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <h3>
            <?php 
            if($prom>30)
            {
                echo '<h1 style="color: green">Aprobo con promedio de:'.$prom.'</h1>';
            } else
            { echo '<h1 style="color: red">No aprobo con un promedio de:'.$prom.'</h1>';
            };
            ?>
    </main>
</body>

</html>