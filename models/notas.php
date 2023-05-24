<?php

namespace nota;

class Nota
{
    private $id;
    private $descripcion;
    private $nota;
    private $codEstudiante;
   

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }
//xd
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }
    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($value)
    {
        $this->nota = $value;
    }
    public function getCodEstudiante()
    {
        return $this->codEstudiante;
    }
    public function setCodEstudiante($value)
    {
        $this->codEstudiante = $value;
    }
}