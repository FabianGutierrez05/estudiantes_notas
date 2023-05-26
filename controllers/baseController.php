<?php namespace baseController;

abstract class BaseController
{
    abstract function create($estudiante);
    abstract function read();
    abstract function update($codigo, $estudiante);
    abstract function delete($codigo);
    abstract function createAct($nota);
    abstract function readAct();
    abstract function updateAct($id, $nota);
    abstract function deleteAct($id);
}