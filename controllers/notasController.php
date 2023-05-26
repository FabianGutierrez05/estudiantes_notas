<?php

namespace notasController;

use conexionDb\ConexionDbController;
use nota\Nota;

class NotasController {
    function createNotas($nota)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $nota->getId() . ',';
        $sql .= '"' . $nota->getDescripcion() . '",';
        $sql .= '"' . $nota->getNota() . '",';
        $sql .= $estudiante->getCodEstudiante();
        $sql .= ');';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
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
    function updateNotas($id, $nota)
    {
            $sql = 'update actividades set ';
            $sql .= 'descripcion= "' .$nota->getNota(). '"';
            $sql .= 'nota= "'.$nota->getNota(). '';
            $sql .= ' where id= ' . $id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
    }
    function deleteNotas($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}