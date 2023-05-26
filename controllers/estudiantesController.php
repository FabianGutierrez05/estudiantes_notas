<?php

namespace estudianteController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudianteController extends BaseController
{
    function create($estudiante, $nota)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombre() . '",';
        $sql .= '"' . $estudiante->getApellido() . '"';
        $sql .= ')';

        $sql1 = 'insert into actividades ';
        $sql1 .= '(id, descripcion, nota, codigoEstudiante) values ';
        $sql1 .= '(';
        $sql1 .= $nota->getId() . ',';
        $sql1 .= $nota->getDescripcion() . ',';
        $sql1 .= '"'.$nota->getNota() . '",';
        $sql1 .= '"'.$estudiante->getCodigo() . '"';
        $sql1 .=')';

        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $resultadoSQL1 = $conexiondb->execSQL($sql1);
        $conexiondb->close();
        if($resultadoSQL && $resultadoSQL1){
        return true;
        }else{
            return false;
        }
    }
    function createNotas($nota)
    {
        $sqlN = 'insert into actividades ';
        $sqlN .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sqlN .= '(';
        $sqlN .= $nota->getId() . ',';
        $sqlN .= '"' . $nota->getDescripcion() . '",';
        $sqlN .= '"' . $nota->getNota() . '",';
        $sqlN .= $estudiante->getCodigo();
        $sqlN .= ');';
        $sqlN .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQLN = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQLN;
    }
    function read()
    {
        $sql = 'select * from estudiantes'; //traer datos
        $conexiondb = new ConexionDbController(); 
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }
    function readNotas()
    {
        $sql = 'select * from actividades'; //traer datos
        $conexiondb = new ConexionDbController(); 
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota = new Nota();
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
            array_push($notas, $nota);
        }
        $conexiondb->close();
        return $notas;
    }

    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {   
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function update($codigo, $estudiante)
    {
            $sql = 'update estudiantes set ';
            $sql .= 'nombres= "'.$estudiante->getNombre(). '",';
            $sql .= 'apellidos= "' .$estudiante->getApellido(). '"';
            $sql .= ' where codigo= ' . $codigo;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
