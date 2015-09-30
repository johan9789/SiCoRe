<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TipoResidencia extends Eloquent {
    protected $table = 'tipo_residencia';
    protected $primaryKey = 'id_tipo_residencia';
    public $timestamps = false;

    public function residencias(){
        return $this->hasMany(ENTITIES_FOLDER.'Residencia', 'id_tipo_residencia');
    }

}