<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Urbanizacion extends Eloquent {
    protected $table = 'urbanizacion';
    protected $primaryKey = 'id_urbanizacion';
    public $timestamps = false;

    public function residencias(){
        return $this->hasMany(ENTITIES_FOLDER.'Residencia', 'id_urbanizacion');
    }

}