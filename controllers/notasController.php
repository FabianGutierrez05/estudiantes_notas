<?php

namespace notasController;

use basecontroller\baseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use nota\Nota;

class NotasController {
    function create($nota)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $nota->getId() . ',';
        $sql .= '"' . $nota->getDescripcion() . '",';
        $sql .= '"' . $nota->getNota() . '",';
        $sql .= '"' . $nota->getCodEstudiante() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    } 
    function read($codigo)
    {
        $sql = 'select * from actividades where codigoEstudiante = '.$codigo; //traer datos
        $conexiondb = new ConexionDbController(); 
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota = new Nota();
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
            $nota->setCodEstudiante($registro['codigoEstudiante']);
            array_push($notas, $nota);
        }
        $conexiondb->close();
        return $notas;
    }
    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $nota = new Nota();
        while ($registro = $resultadoSQL->fetch_assoc()) {   
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
        }
        $conexiondb->close();
        return $nota;
    }
    function update($id, $nota)
    {
            $sql = 'update actividades set ';
            $sql .= 'descripcion= "' .$nota->getDescripcion(). '",';
            $sql .= 'nota= "' .$nota->getNota(). '"';
            $sql .= ' where id= ' . $id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
    }
    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}