<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Persona extends Eloquent {
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps = false;

    public function dueño(){
        return $this->hasOne(ENTITIES_FOLDER.'Dueno', 'id_persona');
    }

    public function getNombreCompletoAttribute(){
        return $this->nombres.' '.$this->paterno.' '.$this->materno;
    }

}