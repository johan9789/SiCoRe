<?php
namespace App\Functions;

class PersonasFunctions extends Initializer {

    public function nuevoID($tabla){
        return $this->init("faNuevoID('{$tabla}')");
    }

    public function validarDoc($tipo, $numero){
        return $this->init("faValidarDoc('{$tipo}', '{$numero}')");
    }

}