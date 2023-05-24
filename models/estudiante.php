<?php

namespace usuario;

class Usuario
{
    private $id;
    private $nombre;
    private $apellido;
   

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }
//xd
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($value)
    {
        $this->nombre = $value;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($value)
    {
        $this->apellido = $value;
    }
}