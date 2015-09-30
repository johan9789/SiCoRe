<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Dueno extends Eloquent {
    protected $table = 'dueño';
    protected $primaryKey = 'id_dueño';
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo(ENTITIES_FOLDER.'Persona', 'id_persona');
    }

    public function residencias(){
        return $this->hasMany(ENTITIES_FOLDER.'Residencia', 'id_dueño');
    }

}