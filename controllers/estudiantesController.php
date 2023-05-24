<?php

namespace estudianteController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudianteController extends BaseController
{
    function create($estudiante)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombre() . '",';
        $sql .= '"' . $estudiante->getApellido() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function createAct($actividades)
    {
        $sql = 'insert into actividades ';
        $sql .= '(codigo,nombre,apellido) values ';
        $sql .= '(';
        $sql .= $usuario->getId() . ',';
        $sql .= '"' . $usuario->getName() . '",';
        $sql .= '"' . $usuario->getUsername() . '",';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
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

    function readRow($id)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {   
            $usuario->setId($registro['id']);
            $usuario->setName($registro['nombre']);
            $usuario->setUsername($registro['apellido']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function update($id, $estudiante)
    {
            $sql = 'update estudiantes set ';
            $sql .= 'nombre= "'.$estudiante->getName(). '",';
            $sql .= 'apellido= "' .$estudiante->getUsername(). '",';
            $sql .= ' where id= ' . $id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from estudiantes where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
