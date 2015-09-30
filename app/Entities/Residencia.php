<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Residencia extends Eloquent {
    protected $table = 'residencia';
    protected $primaryKey = 'id_residencia';
    public $timestamps = false;

    public function dueño(){
        return $this->belongsTo(ENTITIES_FOLDER.'Dueno', 'id_dueño');
    }

    public function tipoResidencia(){
        return $this->belongsTo(ENTITIES_FOLDER.'TipoResidencia', 'id_tipo_residencia');
    }

    public function urbanizacion(){
        return $this->belongsTo(ENTITIES_FOLDER.'Urbanizacion', 'id_urbanizacion');
    }

}